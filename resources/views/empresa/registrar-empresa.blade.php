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
                    <input type="number" class="form-control" name="ruc" placeholder="RUC" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="razon" placeholder="RAZON SOCIAL" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" name="direccion" placeholder="DIRECCION" oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">GUARDAR</button>
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
                        <th class="sorting" rowspan="1" colspan="1">RAZON SOCIAL</th>
                        <th class="sorting" rowspan="1" colspan="1">RUC</th>
                        <th class="sorting" rowspan="1" colspan="1">DIRECCION</th>
                        <th class="sorting" rowspan="1" colspan="1">ESTADO</th>
                        <th class="sorting" rowspan="1" colspan="1">EDITAR</th>
                        <th class="sorting" rowspan="1" colspan="1">ELIMINAR</th>
                      </tr>
                    </thead>
                      <tbody>

                     
                        @foreach ($empresas as $empresa)
                      <tr>
                        <td>{{$empresa->id}}</td>
                        <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$empresa->nom_empresa}}</td>
                        <td>{{$empresa->ruc_empresa}}</td>
                        <td oninput="this.value = this.value.toUpperCase();" style="text-transform: uppercase;">{{$empresa->dir_empresa}}</td>
                        <td>{{$empresa->est_empresa}}</td>
                        <td><a href="{{ route('empresa.edit', $empresa->id) }}" class="btn btn-primary" id="formularioeditar">EDITAR</a></td>
                        <form method="POST" action="{{ route('empresa.registro', ['id' => $empresa->id]) }}">
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


<!-- Modal de edición -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">EDITAR FORMULARIO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          </div>
      </div>
  </div>
</div>
<!--<script>
  Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script>-->



  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#createUserModal').on('shown.bs.modal', function () {
        $('#createUserFormInput').focus(); // Cambiar a un selector válido
    });
    function edit(empresa){
        let ediModal = $('#modaleditempresa')
        $(ediModal).html("")
        let inputs = `
        <input type="text" name="razon" value="${empresa.nom_empresa}">
        <input type="text" name="direccion" value="${empresa.dir_empresa}">
        <input type="text" name="ruc" value="${empresa.ruc_empresa}">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        `
        
        $(ediModal).html(inputs);            
        console.log(empresa);
        }
    
  </script>
@stop
 

