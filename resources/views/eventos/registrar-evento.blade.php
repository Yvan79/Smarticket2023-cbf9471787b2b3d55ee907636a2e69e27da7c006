@extends('adminlte::page')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@section('content')


<br>
<div class="card card-danger">
    <div class="card-header">
    <h3 class="card-title">REGISTRAR EVENTO</h3>
    </div>
    <form class="formularioevento" id="formularioevento" action="{{ url('/guardar-evento') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <select name="empresa" class="form-control" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">
                        <option selected disabled>EMPRESA</option>
                        @forelse ($empresa as $empresa)
                        <option  value="{{$empresa->nom_empresa}}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$empresa->nom_empresa}}</option>
                        @empty
                          
                        @endforelse
                    </select>

                </div>
                <div class="col-2">
                  <select name="tip_evento" class="form-control" >
                      <option selected disabled oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">TIPO DE EVENTO</option>
                        @forelse ($tipoevento as $tipoevento)
                      <option  value="{{$tipoevento->des_evento}}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$tipoevento->des_evento}}</option>
                      @empty
                        
                      @endforelse
                  </select>
                </div>
                <div class="col-3">
                    <input type="text" name="nom_evento" class="form-control" placeholder="NOMBRE DE EVENTO">
                </div>
                <div class="col-3">
                    <input type="text" name="lug_evento" class="form-control" placeholder="LUGAR DE EVENTO">
                </div>
                <div class="col-2">
                    <input type="text" id="fecha_env" name="fecha_env" class="form-control" placeholder="FECHA DE EVENTO" autocomplete="off">
                  </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">GUARDAR</button>
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
                        <th class="sorting" rowspan="1" colspan="1">EMPRESA</th>
                        <th class="sorting" rowspan="1" colspan="1">TIPO DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">NOMBRE DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">LUGAR DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">CODIGO DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">FECHA DE EVENTO</th>
                        <th class="sorting" rowspan="1" colspan="1">EDITAR</th>
                        <th class="sorting" rowspan="1" colspan="1">ELIMINAR</th>
                      </tr>
                    </thead>
                      <tbody>
                        @forelse ($eventos as $eventos)
                        <tr>
                          <td><b>{{$eventos->id_empresa}}</b></td>
                          <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$eventos->tip_evento}}</td>
                          <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$eventos->nom_evento}}</td>
                          <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$eventos->lug_evento}}</td>
                          <td><b>{{$eventos->cod_evento}}</b></td>
                          <td>{{$eventos->fec_evento}}</td>
                          <td><a href="{{ route('evento.edit', $eventos->id) }}" class="btn btn-success" id="formularioeditar">EDITAR</a></td>
                          <form  action="{{ route('eliminar.event', ['id' => $eventos->id]) }}" method="POST">
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

<script>
jQuery(document).ready(function($) {
  $("#fecha_env").datepicker({ dateFormat: 'yy-mm-dd'});
        $("#from").datepicker({ dateFormat: 'yy-mm-dd'}).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#fecha_env").datepicker( "option", "minDate", minValue );
        })
});
</script>

@stop