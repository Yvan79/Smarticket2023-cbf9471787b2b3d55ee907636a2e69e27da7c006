@extends('adminlte::page')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@section('content')
<br>
<div class="card card-danger">
    <div class="card-header">
    <h3 class="card-title">EDITAR EVENTO</h3>
    </div>
    <form class="formularioevento" id="formularioevento" action="{{ url('/guardar-evento') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <select name="empresa" class="form-control" disabled>
                        <option selected>ELIJA EMPRESA</option>
                        @forelse ($empresas as $empresas)
                        <option  value="{{$empresas->id}}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$empresas->nom_empresa}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                <div class="col-2">
                    <input type="text" name="tip_evento" class="form-control" placeholder="TIPO DE EVENTO" disabled>
                </div>
                <div class="col-3">
                    <input type="text" name="nom_evento" class="form-control" placeholder="NOMBRE DE EVENTO" disabled>
                </div>
                <div class="col-3">
                    <input type="text" name="lug_evento" class="form-control" placeholder="LUGAR DE EVENTO" disabled>
                </div>
                <div class="col-2">
                    <input type="text" id="fecha" name="fecha" class="form-control" placeholder="FECHA DE EVENTO" disabled>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" disabled>GUARDAR</button>
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
                        <th class="sorting" rowspan="1" colspan="1">EMPRESA</th>
                        <th class="sorting" rowspan="1" colspan="1">TIPO DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">NOMBRE DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">LUGAR DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">CODIGO DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">FECHA DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">EDITAR</th>
                      </tr>
                    </thead>
                      <tbody>
                        
                        <tr>
                            <form  method="POST" action="{{ route('evento.update', $evento->id) }}">
                                @csrf                              
                                @method('PUT')
                                <td><b>{{$evento->id_empresa}}</b></td>
                                <td>
                                  <select name="tip_evento" class="form-control" >
                                    <option selected oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$evento->tip_evento}}</option>
                                      @forelse ($tipoevento as $tipoevento)
                                    <option  value="{{$tipoevento->des_evento}}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$tipoevento->des_evento}}</option>
                                    @empty
                                      
                                    @endforelse
                                  </select>
                                </td>
                                <td><input type="text" name="nom_evento" value="{{ $evento->nom_evento }}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;"></td>
                                <td><input type="text" name="lug_evento" value="{{ $evento->lug_evento }}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;"></td>
                                <td> <b><label for="">{{$evento->cod_evento}}</label></b></td>
                                <td><input type="text" id="fecha_env" name="fecha_env" value="{{ $evento->fec_evento }}"></td>
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

<script>
  jQuery(document).ready(function($) {
  $("#fecha_env").datepicker({ dateFormat: 'yy-mm-dd',regional: 'es' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#fecha_env").datepicker( "option", "minDate", minValue );
        })
});
  </script>