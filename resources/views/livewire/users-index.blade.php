<div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table  id="access-query" class="table table-bordered table-hover dataTable dtr-inline">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>CODIGO DE EVENTO</th>
                        <th>NOMBRES</th>
                        <th>EMAIL</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->dni}}</td>
                        @if($user->cod_evento === NULL)
                            <td style="color: #f00;font-weight: 600;">Sin Evento Asignado</td>
                        @else
                            <td style="font-weight: 600;">{{$user->cod_evento}}</td>
                        @endif
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td with="10px">
                            <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar Rol</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>