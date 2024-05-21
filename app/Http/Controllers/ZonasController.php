<?php

namespace App\Http\Controllers;
use App\Models\Zonas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = Zonas::all();
        $data = compact('zonas');
        //dd($data);
        return view('zonas.index')->with($data);
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
        $zona = $request->input('nom_zona');
        $zonaupper = strtoupper($zona);

        $eventos = new Zonas();
        $eventos->nom_zona = $zonaupper;
        $eventos->aforo = $request->input('aforo');
        $eventos->save();
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
        $zonas = Zonas::findOrFail($id);
        //dd($empresas);
        $data = compact('zonas');
        //dd($data);
        return view('zonas.edit')->with($data);
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
        $zona = $request->input('nom_zonas');
        $zonaupper = strtoupper($zona);

        $zonas = Zonas::findOrFail($id);
        $zonas->nom_zona = $zonaupper;
        $zonas->aforo = $request->input('aforo');
        $zonas->save();
        return redirect()->route('zonas.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Zonas::findOrFail($id)->delete();
        return redirect()->route('zonas.index');
    }
}
