@guest
    @include('welcome')
@endguest
@auth
    @role('Admin')
        @include('home.dashboards.dashboard-admin')
    @endrole
    @role('Lider')
      {{-- Colocar navbar de lider --}}
    @endrole
     @role('Pastor')
       {{-- Colocar navbar de pastor --}}
    @endrole
@endauth
