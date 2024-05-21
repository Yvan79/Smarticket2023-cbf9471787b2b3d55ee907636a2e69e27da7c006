@extends('adminlte::page')
@section('content')
    <br>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CREAR ZONA</h3>
        </div>
        <form  action="{{ url('/guardar-zona') }}" method="POST">
          @csrf
          <div class="card-body">
                <div class="row">
              
                  <div class="col-5">
                  <input type="text" class="form-control" name="nom_zona" placeholder="NOMBRE DE ZONA">
                  </div>
                  <div class="col-4">
                  <input type="number" class="form-control" name="aforo" placeholder="N° DE AFORO">
                  </div>
                  <div class="col-3">
                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                  </div>
                </div>
            </div>
        </form>
        <div class="card-footer">
        </div>

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
                            <th class="sorting" rowspan="1" colspan="1">NOMBRE DE LA ZONA</th>
                            <th class="sorting" rowspan="1" colspan="1">AFORO</th>
                            <th class="sorting" rowspan="1" colspan="1">EDITAR</th>
                            <th class="sorting" rowspan="1" colspan="1">ELIMINAR</th>
                          </tr>
                        </thead>
                          <tbody>
    
                         
                          @forelse ($zonas as $zonas)
                          <tr>
                            <td>{{$zonas->id}}</td>
                            <td>{{$zonas->nom_zona}}</td>
                            <td>{{$zonas->aforo}}</td>
                            <td><a href="{{ route('zonas.edit', $zonas->id) }}" class="btn btn-primary" id="formularioeditar">EDITAR</a></td>
                            <form method="POST" action="{{ route('eliminar.zonas', ['id' => $zonas->id]) }}">
                              @csrf
                              @method('DELETE')
                              <td><button type="submit" class="btn btn-danger">ELIMINAR</button></td>
                          </form>
                          </tr>
                          @empty
                              
                          @endforelse       
 

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