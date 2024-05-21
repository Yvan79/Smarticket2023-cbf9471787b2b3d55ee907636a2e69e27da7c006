@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Asignar Rol</h1>
@stop
@section('content')
<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Incluye DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@else
    
@endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>
            <h2 class="h5">Listado De Roles</h2>
            {!! Form::model($user, ['route'=>['admin.users.update', $user],'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-2']) !!}
        </div>
    </div>

<script>

    $(document).ready(function() {
        var datatables = $('#access-query').DataTable({
            "lengthMenu": false,
            "bLengthChange" : false,
            "pageLength": 5,
            "pagingType": "numbers",
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
        });
    });
    
    </script>
@stop