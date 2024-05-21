<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        $data = compact('empresas');
        return view('empresa.registrar-empresa')->with($data);
        
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
        $empresas = new Empresa();
        $empresas->ruc_empresa = $request->input('ruc');
        $empresas->nom_empresa = $request->input('razon');
        $empresas->dir_empresa = $request->input('direccion');
        $empresas->save();
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
        $empresas = Empresa::findOrFail($id);
        return view('empresa.edit', compact('empresas'));
        
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

    $empresas = Empresa::find($id);
    $empresas->ruc_empresa = $request->input('ruc');
    $empresas->dir_empresa = $request->input('direccion');
    $empresas->nom_empresa = $request->input('razon');
    $empresas->save();

    return redirect()->route('empresa.registrar-empresa')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::find($id)->delete();
        return redirect()->route('empresa.registrar-empresa');
    }
}
