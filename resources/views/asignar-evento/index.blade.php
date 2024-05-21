@extends('adminlte::page')
@section('content')
<br>
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">ASIGNAR UN EVENTO AL USUARIO</h3>
    </div>
    <form class="formularioasignar" id="formularioasignar" action="{{ route('guardar.datos') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-3">
                    <select class="form-control" id="id_evento" name="id_evento" style="border-color: #ff0202;">
                      <option selected disabled>ELIJA EVENTO</option>
                        @forelse ($evento as $evento)
                        <option value="{{$evento->cod_evento}}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$evento->nom_evento}}</option>
                        @empty
                        <p>Sin Datos</p>
                        @endforelse
                    </select>
                    
                    
                </div>
               
                <div class="col-3">
                    <select class="form-control" id="id_usuario" name="id_usuario" style="border-color: #14e182;">
                      <option selected disabled>ELIJA USUARIO</option>
                        @forelse ($usuario as $usuarios)
                        <option value="{{$usuarios->name}}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$usuarios->id}}-{{$usuarios->name}}</option>
                        @empty
                        <p>Sin Datos</p>
                        @endforelse
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <br>
        </div>
    </form>


    <div class="container">
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
                        <th class="sorting" rowspan="1" colspan="1">USUARIO</th>
                        <th class="sorting" rowspan="1" colspan="1">EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">HORA ASIGNADO</th>
                        <th class="sorting" rowspan="1" colspan="1">ELIMINAR</th>
                      </tr>
                    </thead>
                      <tbody>
                         @foreach ($asignar as $asignar)
                      <tr>
                        <td>{{$asignar->id}}</td>
                        <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$asignar->id_usuario}}</td>
                        <td>{{$asignar->id_evento}}</td>
                        <td>{{$asignar->created_at}}</td>
                        <form method="POST" action="{{ route('eliminar.asignar', ['id' => $asignar->id]) }}">
                          @csrf
                          @method('DELETE')
                          <td><button type="submit" class="btn btn-danger">ELIMINAR</button></td>
                      </form> 
                      </tr>

                        @endforeach
                     
                       
                      </tbody>

                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <br>
    </div>




</div>
@stop