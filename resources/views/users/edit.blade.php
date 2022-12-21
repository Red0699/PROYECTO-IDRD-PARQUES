@extends('layouts.app')

@section('content')
<div class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('user.update', $user->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card text-center">
                        <div class="card-header text-white card-header-primary bg-purple">
                            Editar Usuario
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo electrónico</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" value="{{ old('password', $user->password) }}" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Seleccione un Rol</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control" name="roles">
                                        <option value="">-- Seleccione --</option>
                                            @foreach ($roles as $rol)
                                            
                                            @if ($user->roles[0]->id == $rol->id)
                                            <option value="{{$rol->id}}" selected>{{$rol->name}}</option>
                                            @else
                                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="/user" class="btn btn-light">Volver</a>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection