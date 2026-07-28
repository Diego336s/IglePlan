
<header class="sticky-top bg-white bg-opacity-75 backdrop-blur border-bottom border-white-20 shadow-sm z-1030">
    <div class="container-fluid max-w-7xl px-3 px-sm-4 h-80px d-flex align-items-center justify-content-between">

        {{-- Logo --}}
        <a href="{{ route('welcome') }}" class="d-flex align-items-center text-decoration-none">
            <img id="logo"
                 src="https://pub-835f6df53acf4f8a83bea5912295afb2.r2.dev/Logo%20IGLEPLAN%20sin%20fondo.webp"
                 class="rounded-circle object-fit-cover"
                 alt="IGLEPLAN Logo">
            <span class="ms-2.5 fw-bold text-slate-900 fs-5 tracking-tight">IGLEPLAN</span>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="d-none d-md-flex align-items-center gap-4">
            <a href="{{ route('welcome') }}" 
               class="nav-link-custom {{ request()->routeIs('welcome') ? 'active' : '' }}">
                Inicio
            </a>

            <a href="{{ route('publico.programa.index') }}" 
               class="nav-link-custom {{ request()->routeIs('publico.programa.*') ? 'active' : '' }}">
                Programación
            </a>

            <a href="{{ route('publico.eventos.index') }}" 
               class="nav-link-custom {{ request()->routeIs('publico.eventos.*') ? 'active' : '' }}">
                Eventos
            </a>
        </nav>

        {{-- Desktop CTA --}}
        <div class="d-none d-md-block">
            <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2.5 rounded-3 fw-semibold shadow-sm fs-7">
                Iniciar Sesión
            </a>
        </div>

        {{-- Mobile Menu Trigger --}}
        <button id="mobile-menu-button" type="button" class="d-md-none btn btn-icon glass-panel p-2 rounded-3 text-slate-700" aria-label="Abrir menú">
            <i class="bi bi-list fs-3"></i>
        </button>

    </div>
</header>

{{-- Mobile Overlay & Offcanvas Menu --}}
<div id="mobile-overlay" class="mobile-overlay d-none"></div>

<aside id="mobile-menu" class="mobile-aside glass-panel border-start border-white-20 shadow-lg">
    <div class="d-flex align-items-center justify-content-between h-80px px-4 border-bottom border-white-20">
        <div class="d-flex align-items-center gap-2">
            <img src="https://pub-835f6df53acf4f8a83bea5912295afb2.r2.dev/Logo%20IGLEPLAN%20sin%20fondo.webp" class="rounded-circle h-40px w-40px" alt="IGLEPLAN">
            <span class="fw-bold text-slate-900 fs-6">IGLEPLAN</span>
        </div>
        <button id="close-mobile-menu" type="button" class="btn btn-icon text-slate-600 p-1" aria-label="Cerrar menú">
            <i class="bi bi-x-lg fs-5"></i>
        </button>
    </div>

    <nav class="d-flex flex-column p-4 gap-2">
        <a href="{{ route('welcome') }}" 
           class="mobile-nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}">
            <i class="bi bi-house me-2"></i> Inicio
        </a>

        <a href="{{ route('publico.programa.index') }}" 
           class="mobile-nav-link {{ request()->routeIs('publico.programa.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-week me-2"></i> Programación
        </a>

        <a href="{{ route('publico.eventos.index') }}" 
           class="mobile-nav-link {{ request()->routeIs('publico.eventos.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-event me-2"></i> Eventos
        </a>

        <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-4 py-2.5 rounded-3 fw-semibold shadow-sm">
            Iniciar Sesión
        </a>
    </nav>
</aside>