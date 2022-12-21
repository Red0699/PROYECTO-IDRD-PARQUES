@extends('layouts.app')

@section('content')

@include('layouts.headers.headersMaps')

<!-- Contenido -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <iframe class="map-canvas" id="map-default" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d254507.56233222116!2d-74.10781015680236!3d4.650924648555486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sparques%20administrados%20por%20el%20idrd!5e0!3m2!1ses!2sco!4v1671566822482!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<!-- Optional JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
@endpush