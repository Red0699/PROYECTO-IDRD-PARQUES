@extends('layouts.app')

@section('content')
<div class="content py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('permission.update', $permission->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card text-center">
            <div class="card-header text-white card-header-primary bg-purple">

              Editar Permisos
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $permission->name) }}" autofocus>
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>
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