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
                                <h4 class="card-title">Permisos</h4>
                                <p class="card-category">Permisos registrados</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">

                                        <a type="button" class="btn btn-primary" href="{{ url('/permission/create') }}">Añadir Permisos</a>

                                    </div>
                                </div>
                                <div class="table-responsive m-2">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Guard</th>
                                            <th>Created_at</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody class="list">
                                            @forelse ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td class="td-actions text-right">

                                                    <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-info"><i class="fas fa-user-alt"></i></a>


                                                    <a href="{{ route('permissionEdit.edit', $permission->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>


                                                </td>
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
                            <div class="card-footer mr-auto">
                                {{ $permissions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection