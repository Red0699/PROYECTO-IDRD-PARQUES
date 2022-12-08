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
                                <h4 class="card-title">Roles</h4>
                                <p class="card-category">Roles registrados</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        @can('role_create')
                                        <a type="button" class="btn btn-primary" href="{{ url('/rol/create') }}">Añadir Rol</a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="table-responsive m-2">
                                    <table class="table" id="rolTable">
                                        <thead class="thead-light">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Guard</th>
                                            <th>Fecha de creación</th>
                                            <th>Permisos</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody class="list">
                                            @forelse ($roles as $rol)
                                            <tr>
                                                <td>{{ $rol->id }}</td>
                                                <td>{{ $rol->name }}</td>
                                                <td>{{ $rol->guard_name }}</td>
                                                <td>{{ $rol->created_at }}</td>
                                                <td>
                                                    @forelse ($rol->permissions as $permission)
                                                        <span class="badge badge-info">{{ $permission->name}}</span>
                                                    @empty
                                                    <span class="badge badge-danger">No tiene permisos</span>
                                                    @endforelse
                                                </td>
                                                <td class="td-actions text-right">
                                                    @can('role_edit')
                                                    <a href="{{ route('rolEdit.edit', $rol->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @endcan
                                                    @can('role_destroy')
                                                    <form action="{{ route('rol.destroy', $rol->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    @endcan
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection