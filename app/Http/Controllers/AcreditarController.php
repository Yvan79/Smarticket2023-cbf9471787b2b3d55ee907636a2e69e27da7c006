<?php

namespace App\Http\Controllers;
use App\Models\Acreditar;
use App\Models\Acceso;
use App\Models\User;
use App\Models\Historiales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use App\Rules\DniValidation;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExportHistoriales;
use PhpParser\Node\Stmt\If_;

class AcreditarController extends Controller
{
    /**
     * Display a listing of the resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dni = $request['dni'] ?? "";
        $search = $request['search'] ?? "";
        if($search != ""){
            $historiales = Historiales::all();
            $acreditados = Acreditar::where(function ($query) use ($search) {$query->where('dni_acreditar', 'like', '%' . $search . '%')->orWhere('barcode', 'like', '%' . $search . '%');})->get();
            $acceso = Acceso::all();
            $user = User::all();
        }else{
            $historiales = Historiales::all();
            $acreditados = Acreditar::all();
            $acceso = Acceso::all();
            $user = User::all();
        }
        $data = compact('acreditados','search','acceso','user','dni','historiales');
        return view('acreditacion.consultaracreditado')->with($data);
    }
    public function acreditar(Request $request){
        $dni = $request->input('dni');
        $acreditados = Acreditar::all();
        $acceso = Acceso::all();
        $user = User::all();
        if ($acreditados) {
            return view('acreditacion.acreditar-personal', [ 'acreditados' => $acreditados, 'dni' => $dni, 'user' => $user, 'acceso' => $acceso]);
        } else {
            return redirect()->route('acreditacion.acreditar-personal')->with('dni', $dni);
        }
    }
    public function exportExcel()
    {
        $data = Historiales::select('id_acceso','dni_acreditar', 'nom_acreditar','cod_usuario','barcode','estado','created_at')->get()->toArray();
        //dd($data);
        return Excel::download(new DataExportHistoriales($data), 'historiales.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function imprimirAcdt(){
        $ultimaFila = Acreditar::latest()->first();
        $barcode = new DNS1D();
        $barcode->setStorPath(storage_path('app/public/barcodes'));
        $codigoBarras = $barcode->getBarcodeHTML($ultimaFila->cod_evento . $ultimaFila->correlativo, 'C128', 2,50 );    
        return view('acreditacion.brazalete', compact('ultimaFila','codigoBarras'));
    }
    public function imprimir($id){
        $ultimaFila = Acreditar::findOrFail($id);
        $barcode = new DNS1D();
        $barcode->setStorPath(storage_path('app/public/barcodes'));
        $codigoBarras = $barcode->getBarcodeHTML($ultimaFila->cod_evento . $ultimaFila->correlativo, 'C128', 2,50 );    
        return view('acreditacion.brazalete', compact('ultimaFila','codigoBarras'));
    }
    public function procesar(Request $request)
    {
        $dni = $request->input('dni');
        $acreditados = Acreditar::where('dni_acreditar', $dni)->first();
        if ($acreditados) {
            return view('acreditacion.acreditar-personal', [ 'acreditados' => $acreditados, 'dni' => $dni]);
        } else {
            $existingUser = Acreditar::where('dni_acreditar', '!=' ,$request->dni)->first();
            if ($existingUser) {
                session()->flash('NOTCREDIT', '¿Desea acreditar el Documento Nro° ' .$dni. '?' );
                return redirect()->back()->with('error', 'El correo electrónico ya está en uso.')->with('dni', $dni);   
            }
        }
    }
    public function ValidateSearch(Request $request){
        $dni = $request->input('dni');
         $acreditar = Acreditar::where(function ($query) use ($dni) {
            $query->where('dni_acreditar', $dni)
                  ->orWhere('barcode', $dni);
        })->first();
         if ($acreditar) {
             $historiales = Historiales::create([
                 'id_acceso' => $acreditar->id_acceso,
                 'dni_acreditar' => $acreditar->dni_acreditar,
                 'nom_acreditar' => $acreditar->nom_acreditar,
                 'barcode' => $acreditar->barcode,
                 'cod_usuario' => $acreditar->cod_usuario,
                 'estado' => $acreditar->estado
             ]);
             $count = Historiales::where(function ($query) use ($dni) {
                $query->where('dni_acreditar', $dni)
                      ->orWhere('barcode', $dni);
            })->count();
                if ($count > 1) {
                    $historiales->update(['estado' => 2]);
                }
             $datosHistoriales = Historiales::where(function ($query) use ($dni) {
                $query->where('dni_acreditar', $dni)
                      ->orWhere('barcode', $dni);
            })->orderBy('created_at','desc')->get();
             return view('acreditacion.consultaracreditado', ['datosHistoriales' => $datosHistoriales, 'dni'=> $dni, 'historiales'=> $historiales, 'readonly' => true]);
         } else {
             return view('acreditacion.consultaracreditado', ['dni'=> $dni,  'readonly' => false])->with('error', 'El DNI no existe en la tabla de acreditación.');
         }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fechaYHoraActual = Carbon::now();
        $ultimoNumeroCorrelativo  = Acreditar::max('correlativo');
        $nuevoNumeroCorrelativo = str_pad((int)$ultimoNumeroCorrelativo + 1, 5, '0', STR_PAD_LEFT);
        $request->validate([
            'dni' => ['required', new DniValidation],
            'nombres' => ['required'],
        ]);
        $existingUser = Acreditar::where('dni_acreditar', $request->dni)->first();
        if ($existingUser) {
            session()->flash('alerta', 'INTENTE CON UN NUEVO DNI');
            return redirect()->back()->with('error', 'El correo electrónico ya está en uso.');
        }
        $acreditar = new Acreditar();
        $acreditar->dni_acreditar = $request->input('dni');
        $acreditar->nom_acreditar = strtoupper($request->input('nombres'));
        $acreditar->id_acceso = $request->input('acceso');
        $acreditar->correlativo = $nuevoNumeroCorrelativo;
        $acreditar->fec_acreditar = $fechaYHoraActual->format('Y-m-d H:i:s');
        $acreditar->cod_usuario = $request->input('cod_usuario');
        $acreditar->cod_evento = $request->input('cod_evento');
        $Correlativo = $nuevoNumeroCorrelativo;
        $cod_evento = $request->input('cod_evento');
        $barcode = $cod_evento.$Correlativo;
        $acreditar->barcode = $barcode;
        $acreditar->save();
        return redirect()->back()->with('eliminar','ok');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
