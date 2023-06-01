@extends('layouts.app')

@section('content')
<div class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-category">Usuarios registrados</p>
                                @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="row">

                                    <a type="button" class="btn btn-primary" href="{{ url('/user/create') }}">Añadir Usuario</a>
                                    <a type="button" class="btn btn-primary" href="{{ url('/informeUsuarios') }}">Ver Informe</a>

                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive m-2">
                                    <table class="table" id="userTable">
                                        <thead class="thead-light">
                                            <th>ID</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Fecha de creación</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody class="list">
                                            @forelse ($users as $user)
                                            <tr>
                                                @if($user->id != 1)
                                                <td>{{ $user->id }}</td>
                                                @if($user->photo == null)
                                                <td>
                                                    <span class="avatar avatar-sm rounded-circle">
                                                        <img src="../assets/img/theme/default-user-image.png" alt="">
                                                    </span>
                                                </td>
                                                @else
                                                <td>

                                                    <img src="{{ $user->photo }}" class="img-fluid rounded-circle avatar-sm">

                                                </td>
                                                @endif
                                                <td>{{ $user->name }}</td>
                                                <th>{{ $user->email }}</th>
                                                <td>
                                                    @forelse ($user->roles as $role)
                                                    {{ $role->name }}
                                                    @empty
                                                    <span class="badge badge-danger">Sin rol</span>
                                                    @endforelse
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td class="td-actions text-right">

                                                    <a href="{{ route('user.show', $user->id) }}" class="btn bg-purple text-white btn-sm"><i class="fas fa-user"></i></a>
                                                    <a href="{{ route('userEdit.edit', $user->id) }}" class="btn bg-yellow text-white btn-sm"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Está seguro que desea realizar esta acción?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit" rel="tooltip">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                                @endif
                                            </tr>
                                            @empty

                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/fonts/Roboto.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            language: {
                lengthMenu: 'Mostrando _MENU_ registros por página',
                zeroRecords: 'No hay registros para mostrar',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'No hay registros...',
                infoFiltered: '(filtrando de _MAX_ registros disponibles)',
                sSearch: 'Buscar',
                'paginate': {
                    'previous': '<i class="fas fa-light fa-arrow-left"></i>',
                    'next': '<i class="fas fa-light fa-arrow-right"></i>'
                },
                buttons: {
                    pageLength: 'Mostrando %d filas'
                },
            },
        });
    });
</script>


@endpush



@endsection