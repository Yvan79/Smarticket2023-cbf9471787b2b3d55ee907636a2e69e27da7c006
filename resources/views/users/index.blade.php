@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop
@section('content')
<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Incluye DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@livewire('users-index')
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