@extends('adminlte::page')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<br>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">REGISTRAR EMPRESA</h3>
    </div>
    <form class="formularioempresa" id="formularioempresa" action="{{ url('/guardar-empresa') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <input type="number" class="form-control" name="ruc" placeholder="RUC" disabled>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="razon" placeholder="RAZON SOCIAL" disabled>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" name="direccion" placeholder="DIRECCION" disabled>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info" disabled>GUARDAR</button>
        </div>
    </form>

    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-body">
                <div class="" >
                  <div class="row">
                    <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                      <tr>
                        <th class="sorting" rowspan="1" colspan="1">ID</th>
                        <th class="sorting" rowspan="1" colspan="1">RAZON SOCIAL</th>
                        <th class="sorting" rowspan="1" colspan="1">RUC</th>
                        <th class="sorting" rowspan="1" colspan="1">DIRECCION</th>
                        <th class="sorting" rowspan="1" colspan="1">ESTADO</th>
                        <th class="sorting" rowspan="1" colspan="1">EDITAR</th>
                        <!--<th class="sorting" rowspan="1" colspan="1">Eliminar</th>-->
                      </tr>
                    </thead>
                      <tbody>

                     
                      <tr>
                        <form  method="POST" action="{{ route('empresa.update', $empresas->id) }}">
                            @csrf
                            @method('PUT')
                            <td><label for="">{{$empresas->id}}</label></td>
                            <td><input type="text" name="razon" value="{{ $empresas->nom_empresa }}"></td>
                            <td><input type="text" name="ruc" value="{{ $empresas->ruc_empresa }}"></td>
                            <td><input type="text" name="direccion" value="{{ $empresas->dir_empresa }}"></td>
                            <td><label for="">{{$empresas->est_empresa}}</label></td> 
                            <!-- Otros campos -->
                            <td><button type="submit" class="btn btn-primary">ACTUALIZAR</button></td>
                            
                            
                        </form>

                      </tr>
                      </tbody>
                    </table>
                    <center><a href="{{ url()->previous() }}" class="btn btn-primary" style="margin: 8px;">REGRESAR</a></center>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <br>
    </div>

  <!-- Scripts -->
  
@stop
 





