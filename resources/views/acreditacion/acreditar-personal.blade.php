@extends('adminlte::page')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="container-md">
  <br>
  <h2>ACREDITAR PERSONAL</h2>
  <hr width="100%" />
    <div class="row">
      <div class="col-md-4">
      <label for="dni">*DNI</label>
        <form class="formulariovalidar" id="myform" method="POST">
          @csrf
            <div class="form-group" style="display: flex">
          @if(!empty($acreditados->dni_acreditar ))
          <input type="hidden" name="id" value="{{$acreditados->id}}">
            <input type="text" name="dni-value" class="form-control" style="margin-right: 20px" value="{{ $acreditados->dni_acreditar }}" readonly>
          @else
            <input type="text" name="dni" class="form-control" style="margin-right: 20px" value="{{ session('dni') }}" placeholder="INGRESE DNI" >
          @endif
          @if(!empty($acreditados->dni_acreditar ))
            <button type="submit" name="action" id="validate-button" class="btn btn-sm btn-danger " value="validar" disabled>CONSULTAR</button>
          @else
            <button type="submit" name="action" id="validate-button" class="btn btn-sm btn-danger"  value="validar" >CONSULTAR</button>
          @endif
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="cod_usuario" id="cod_usuario" value="{{ auth()->user()->cod_usuario }}" >
            <input type="hidden" class="form-control" name="cod_evento" id="cod_evento" value="{{ auth()->user()->cod_evento }}" >
          </div>
          <div class="form-group">
            @if(!empty($acreditados->dni_acreditar ))
            <label for="nombres">NOMBRES Y APELLIDOS</label>
            <input type="text" name="nombres-value" class="form-control" value="{{ $acreditados->nom_acreditar }}" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;" readonly> 
          @else
          <label for="nombres">NOMBRES Y APELLIDOS</label>
          <input type="text"  name="nombres" id="idnombre"  class="form-control" value="" placeholder="NOMBRES Y APELLIDOS" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">
          @endif
          </div>        
          <div class="form-group">
            @if(!empty( $acreditados->dni_acreditar ))
            <label for="acceso">TIPO DE ACCESO</label>
            <input type="text" name="acceso-value" class="form-control" value="{{ $acreditados->id_acceso }}" readonly>
          @else
          <label for="acceso">TIPO DE ACCESO</label>
          <select class="form-control" name="acceso" id="acceso" placeholder="Tipo de Acceso" required>
            <option value="0" selected disabled value="">== SELECCIONE ==</option>
            @forelse ($acceso as $acceso)      
              <option value="{{$acceso->nom_acceso}}">{{$acceso->nom_acceso}}</option>
              @empty
              @endforelse
          </select>
          @endif
          </div>
          @if(!empty($acreditados->dni_acreditar ))
          @can('brazaletes.acreditar.imprimir')
          <a href="{{route('acreditacion.brazalete', $acreditados->id)}}" id="impr" class="btn btn-sm btn-success mb-0">REIMPRIMIR</a>
          @endcan
          <a href="{{route('acreditacion.acreditar-personal')}}" class="btn btn-sm btn-primary">LIMPIAR</a>
          @else
          <button type="submit" name="action" id="credit-button" class="btn btn-sm btn-success mb-0" value="registrar" >ACREDITAR</button>
          
          @endif
        </form>
      </div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
</div>
<script>
  document.getElementById('validate-button').addEventListener('click', function() {
      document.getElementById('myform').action = "{{ url('/procesar') }}";
      document.getElementById('dni').name = 'campo_validar1';
      document.getElementById('myform').submit();
  });
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('credit-button').addEventListener('click', function() {
      document.getElementById('myform').action = "{{ url('/guardar-acreditado') }}";
      document.getElementById('nombres').name = 'campo_acreditar1';
      document.getElementById('acceso').name = 'campo_acreditar2';
      document.getElementById('myform').submit();
  });
   });
</script>
@if (Session::has('eliminar'))
    <script>
          const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Guardado Exitoso',
          text: "Impresión de brazalete (Proceso Único)",
          icon: 'success',
          showCancelButton: false,
          confirmButtonText: 'Imprimir Mi Brazalete!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            var url = "{{ url('/imprimir-brazalete') }}";
            var newWindows = window.open(url, "_blank");
          } else if (

            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
        })
    </script>
@endif
@if(session('alerta'))
<script>
    Swal.fire({
        title: 'PERSONAL ACREDITADO',
        text: '{{ session('alerta') }}',
        icon: 'error'
    });
</script>
@endif
@if(session('NOTCREDIT'))
<script>
    Swal.fire({
      title: 'PERSONAL NO ACREDITADO',
      text: '{{ session('NOTCREDIT') }}',
      icon: 'warning',
      confirmButtonText: 'ENTIENDO'
    }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('idnombre').focus();
        }
      });
</script>
@endif
@stop