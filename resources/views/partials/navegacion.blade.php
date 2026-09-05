@guest
    @include('partials.navigation.navbar-invitados')
@endguest
@auth
    @role('Admin')
        @include('partials.navigation.navbar-admin')
    @endrole
    @role('Lider')
      {{-- Colocar navbar de lider --}}
    @endrole
     @role('Pastor')
       {{-- Colocar navbar de pastor --}}
    @endrole
@endauth
