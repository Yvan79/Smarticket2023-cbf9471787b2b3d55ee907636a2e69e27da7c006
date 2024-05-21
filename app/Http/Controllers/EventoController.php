<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\TipoEvento;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        $empresa = Empresa::all();
        $tipoevento = TipoEvento::all();
        $data = compact('eventos','empresa','tipoevento');
        return view('eventos.registrar-evento')->with($data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $randomCode = Str::random(5);
        $textconver = strtoupper($randomCode);
        //dd($textconver);
        $eventos = new Evento();
        
        //dd($eventos);
        $eventos->id_empresa = $request->input('empresa');
        $eventos->tip_evento = $request->input('tip_evento');
        $eventos->nom_evento = $request->input('nom_evento');
        $eventos->lug_evento = $request->input('lug_evento');
        $eventos->fec_evento = $request->input('fecha_env');
        $eventos->cod_evento = $textconver;
        $eventos->save();
        /*return redirect()->route('acreditacion.consultaracreditado')->with('eliminar','ok');*/
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
        $evento = Evento::findOrFail($id);
        $empresas = Empresa::all();
        $tipoevento = TipoEvento::all();
        //dd($empresas);
        $data = compact('evento', 'empresas','tipoevento');
        //dd($data);
        return view('eventos.edit')->with($data);
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
    $evento = Evento::findOrFail($id);
    $evento->tip_evento = $request->input('tip_evento');
    $evento->nom_evento = $request->input('nom_evento');
    $evento->lug_evento = $request->input('lug_evento');
    $evento->fec_evento = $request->input('fecha_env');
    //dd($evento);
    $evento->save();

    return redirect()->route('eventos.registrar-evento')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evento::find($id)->delete();
        return redirect()->route('eventos.registrar-evento');
    }
}
