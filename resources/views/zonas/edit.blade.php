@extends('adminlte::page')
@section('content')
    <br>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">EDITAR ZONA</h3>
        </div>
        <form  action="{{ url('/guardar-zona') }}" method="POST">
          @csrf
          <div class="card-body">
                <div class="row">
              
                  <div class="col-5">
                  <input type="text" class="form-control" name="nom_zona" placeholder="NOMBRE DE LA ZONA" disabled>
                  </div>
                  <div class="col-4">
                  <input type="number" class="form-control" name="aforo" placeholder="AFORO" disabled>
                  </div>
                  <div class="col-3">
                      <button type="submit" class="btn btn-primary" disabled>GUARDAR</button>
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
                            <th class="sorting" rowspan="1" colspan="1">NOMBRE DE ZONA</th>
                            <th class="sorting" rowspan="1" colspan="1">AFORO</th>
                            <th class="sorting" rowspan="1" colspan="1">EDITAR</th>
                          </tr>
                        </thead>
                          <tbody>
    
                         
                          
                          <tr>
                            <form  method="POST" action="{{ route('zonas.update', $zonas->id) }}">
                                @csrf                              
                                @method('PUT')
                                <td><b>{{$zonas->id}}</b></td>
                                <td><input type="text" name="nom_zonas" value="{{ $zonas->nom_zona }}"></td>
                                <td><input type="number" name="aforo" value="{{ $zonas->aforo }}"></td>
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

    </div>
@stop