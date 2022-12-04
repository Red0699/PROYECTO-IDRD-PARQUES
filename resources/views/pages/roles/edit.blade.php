@extends('layouts.app')

@section('content')
<div class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('rol.update', $rol->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card text-center">
                        <div class="card-header text-white card-header-primary bg-purple">

                            Editar Rol
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $rol->name) }}" autofocus>
                                </div>
                            </div>
                            <div class="row ">
                                <label for="name" class="col-sm-2 col-form-label ">Asignar Permisos</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($permissions as $id => $permission)
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox mb-3">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                                            value="{{ $id }}"{{ $rol->permissions->contains($id) ? 'checked' : ''}}>
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $permission }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--Footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="/rol" class="btn btn-light">Volver</a>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection