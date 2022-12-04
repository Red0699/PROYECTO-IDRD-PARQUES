@extends('layouts.app')

@section('content')
<div class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('rol.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card text-center">
                        <div class="card-header text-white card-header-primary bg-purple">
                            Registrar Rol
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="/permission" class="btn btn-light">Volver</a>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection