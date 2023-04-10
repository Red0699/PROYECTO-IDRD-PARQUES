@auth()
@if(auth()->user()->hasRole('Usuario'))
        @include('layouts.navbars.navs.authUsuario')
    @else
        @include('layouts.navbars.navs.auth')
    @endif
@endauth
    
@guest()
    @include('layouts.navbars.navs.guest')
@endguest