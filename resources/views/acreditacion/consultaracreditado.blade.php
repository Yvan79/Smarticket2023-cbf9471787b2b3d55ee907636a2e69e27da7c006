@extends('adminlte::page')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"></script>
<script src="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@section('title', 'Consultar')
@section('content')



<style>
  @media screen and (max-width: 340px) {
      p.notevent {
        font-size: 30px!important;
    }
    .warning-event {
        font-size: 30px!important;
    }
    .success-event {
        font-size: 30px!important;
    }
}
</style>
<div class="container-md">
  <br>
  <!---->
  <h2>CONSULTAR ACCESO</h2>
  <hr width="100%" />  	
  <div class="row align-items-end list">
      <div class="col-3"></div>
      <div class="col-sm-5 col-md-6">
          <br>
          <!--form meth-->
          <form method="GET" action="{{ url('/validar') }}">

            <label  class="visually-hidden">CODIGO DE BRAZALETE</label>
            <div class="form-search" style="display: flex; align-items: center;">
            <input type="text" name="dni" value="{{ $dni}}" class="form-control" id="dni" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;" placeholder="77777777 | XXXXX00000">
            <!--<input type="text" name="dni" value="{{ $dni}}" class="form-control" id="dni" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;" placeholder="77777777 | XXXXX00000" {{ $readonly ? 'readonly' : ''}}>-->
            <a href="">
              <button class="btn btn-primary btn-sm" type="submit" id="btn-validar" style="margin-left: 10px">CONSULTAR</button>
            </a>
            
            <a href="{{ url('/validar') }}">
              <button class="btn btn-danger btn-sm" id="btn-limpiar" style="margin-left: 5px;" type="button">LIMPIAR</button>
            </a>
          </div>
          </form>
      </div>
      <div class="col-3"></div>


      <div class="container-md">
   <div class="row">
    

    @if ( isset($datosHistoriales) ) 
    <div class="col" style="text-align: center;">
      <div class="novo">
        @if ($datosHistoriales->isNotEmpty())
      @php
          $ultimoDato = $datosHistoriales->first();
      @endphp
          <div class="container-md">
              @if ($ultimoDato->estado == 1)
                  <div class="success-event" style="font-weight: 700;color: #29d900;font-size: 35px;padding: 30px;font-size: 60px;">PERSONA AUTORIZADA</div>
                  <script>
                    var soundfile = "/audio/ding.mp3";
                    Swal.fire({
                      customClass: {
                        confirmButton: 'swalBtnColorch'
                      },
                      icon: "success",
                      iconColor: '#03ac00',
                      text: '',
                      title: "PERSONA AUTORIZADA",
                      width: 600,
                      padding: "3em",
                      color: "#fff",
                      background: "#00e40d",
                      backdrop: `
                      rgb(0 228 13)
                      `,
                      confirmButtonColor: "#0b65f3d1 ",
                      didOpen: function () {
                                    var audplay = new Audio(soundfile);
                                    audplay.play();
                                }
                    });
                  </script>
                   <style>
                    .swal2-styled.swal2-confirm.swalBtnColorch {
                      color: #ffffff
                    }
                  </style>
              @else
                  <div class="warning-event" style="font-weight: 700;color: #ff0505;font-size: 35px;padding: 30px;font-size: 60px;">REINGRESO</div>
                  <script>
                    var soundfile = "/audio/negative.mp3";
                    Swal.fire({
                      customClass: {
                        confirmButton: 'swalBtnColor'
                      },
                      icon: "error",
                      iconColor: '#f8fe00',
                      text: '',
                      title: "REINGRESO DE PERSONAL",
                      width: 600,
                      padding: "3em",
                      color: "#fff",
                      background: "#dc3545",
                      backdrop: `
                        #dc3545
                      `,
                      confirmButtonColor: "#f8fe00 ",
                      didOpen: function () {
                                    var audplay = new Audio(soundfile);
                                    audplay.play();
                                }
                    });
                  </script>
                  <style>
                    .swal2-styled.swal2-confirm.swalBtnColor {
                      color: #000000
                    }
                  </style>
              @endif
          </div>
      @endif
        
      </div>
    </div>
    
    <br>
    <p></p>

    
    <div class="container">
      @can('brazaletes.consultar.reporte')
      <div class="card">

        <div class="card-body">
          <div class="" >
    <div class="row">
      
      <div class="col-sm-12">
        <div class="dt-buttons btn-group flex-wrap"> 
          <button id="export-excel" class="btn btn-success">Excel</button> 
          <button id="print-excel" class="btn btn-success" disabled>Imprimir</button> 
       </div>
        <p>
          <div class="table-responsive">
          <table id="access-query" class="table table-bordered table-hover dataTable dtr-inline reponsive table table-striped nowrap" aria-describedby="example2_info">
            <thead style="background: #6bff7d;">
                <tr>
                    <th rowspan="1" colspan="1">ACCESO</th>
                    <th rowspan="1" colspan="1">DNI</th>
                    <th rowspan="1" colspan="1">NOMBRES Y APELLIDOS</th>
                    <th rowspan="1" colspan="1">CODIGO</th>
                    <th rowspan="1" colspan="1">HORA</th>
                    <th rowspan="1" colspan="1">ESTADO</th>
                </tr>
            </thead>
            <tbody>
              @forelse ($datosHistoriales as $historial)
                <tr>
                  <td>{{ $historial->id_acceso}}</td>
                    <td>{{ $historial->dni_acreditar}}</td>
                    <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{ $historial->nom_acreditar }}</td>
                    <td>{{ $historial->barcode }}</td>
                    <td><b>{{ $historial->created_at->format('H:i:s') }} .Hrs</b></td>
                    @if ( $historial->estado  == 1)
                    <td style="font-weight: 700;color: #29d900;">PERSONA AUTORIZADA</td>
                    @else
                    <td style="font-weight: 700;color: #ff0505;">REINGRESO</td>
                    @endif
                </tr>
                @empty
              <center><p>DNI O CODIGO NO EXISTEN EN LA BASE DE DATOS</p></center>
              @endforelse
            </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  </div>
  @endif
</div>
@endcan
@if ( ($dni) == "")
@elseif(isset($error))
<div>
  <center><p class="notevent" style="font-size: 50px;color: rgb(255, 193, 7, 1);padding: 30px;font-weight: 700;">DNI O CODIGO NO EXISTEN EN LA BASE DE DATOS</p></center>
    <script>
        var soundfile = "/audio/negative.mp3";
        Swal.fire({
          customClass: {
            confirmButton: 'swalBtnColorwr'
          },
          icon: "warning",
          iconColor: '#000',
          text: '',
          title: "NO PERTENECE AL EVENTO",
          width: 600,
          padding: "3em",
          color: "#fff",
          background: "#ffc107",
          backdrop: `
          rgba(255, 193, 7, 1)
          `,
          confirmButtonColor: "#000 ",
          didOpen: function () {
              var audplay = new Audio(soundfile);
              audplay.play();
            }
          });

        
    </script>
    <style>
      .swal2-styled.swal2-confirm.swalBtnColor {
        color: #000000;
        text-shadow: 1px 1px 1px #000!important;
      }
    </style>
</div>
@endif
</div>
    <div class="col"></div>
    </div>
  </div>
</div>
</div>


<script>

$(document).ready(function() {
    var datatables = $('#access-query').DataTable({
        "lengthMenu": [5, 10, 25, 50, 100],
        "pageLength": 5,
          responsive: true,
        "pagingType": "full",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        },

    });

    $('#export-excel').on('click', function() {
      window.location.href = '/export-excel';
    });
});

</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById('btn-validar').addEventListener('click', function() {
      console.log("llegue");
        document.querySelector('form').submit();
        window.history.pushState({}, document.title, "/validar");
    });
  });
  </script>
@stop

