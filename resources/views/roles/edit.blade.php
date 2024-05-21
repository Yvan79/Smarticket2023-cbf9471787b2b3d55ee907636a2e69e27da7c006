@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Roles</h1>
@stop
<!-- Incluye DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Incluye DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@else
    
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route'=>['admin.roles.update',$role], 'method'=> 'put']) !!}
        @include('roles.partials.form')
        {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
        <a href="/roles" class="btn btn-primary">Regresar</a>
        <center><a href="/roles" class="btn btn-primary" style="margin: 8px;">REGRESAR</a></center>
        {!! Form::close() !!}
    </div>
</div>

@stop