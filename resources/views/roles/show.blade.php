@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mostrar Roles</h1>
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


    <script>

        $(document).ready(function() {
            var datatables = $('#access-query').DataTable({
                "lengthMenu": [6, 10, 25, 50, 100],
                "pageLength": 6,
                "pagingType": "full",
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                },
                columnDefs: [{
                    width: "10px",
                    targets: 0
                },
                {
                    width: "40px",
                    targets: 1
                },
                {
                    width: "150px",
                    targets: 2
                },
                {
                    width: "70px",
                    targets: 3
                },
                {
                    width: "30px",
                    targets: 4
                }
                ]
            });

        });
        
        </script>
@stop