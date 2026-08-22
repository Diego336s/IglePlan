    @vite(['resources/css/admin/partials/navbar.css', 'resources/js/admin/partials/navbar.js'])
    <div class="container">
        <!-- Navbar Superior Responsive -->
        <nav class="navbar bg-white border-bottom py-2 shadow-sm rounded-4 mb-3 mb-md-4">
            <div class="container-fluid px-2 px-sm-3 d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center gap-2 gap-sm-3">
                    <!-- Botón Hamburguesa -->
                    <button class="btn btn-light border-0 p-2 d-flex align-items-center justify-content-center rounded-3"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                        aria-label="Abrir menú de navegación">
                        <i class="bi bi-list fs-4 text-dark"></i>
                    </button>

                    <!-- Brand / Logo -->
                    <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark m-0 fs-6 fs-sm-5"
                        href="#">

                        <span class="d-inline-block">IGLEPLAN</span>
                        <span
                            class="badge bg-light text-secondary border font-monospace extra-small d-none d-md-inline-block">ADMIN</span>
                    </a>
                </div>

                <!-- Controles a la Derecha -->
                <div class="d-flex align-items-center gap-2 gap-sm-3">
                    <!-- Reloj en tiempo real -->
                    <div class="d-none d-lg-flex align-items-center gap-2 text-muted small border-end pe-3">
                        <i class="bi bi-clock"></i>
                        <span id="headerTime" class="font-monospace">14:09:12</span>
                    </div>

                    <!-- Perfil del Administrador -->
                    <div class="dropdown">
                        <button class="btn btn-link p-0 text-decoration-none d-flex align-items-center gap-2 border-0"
                            type="button" id="userDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true"
                            aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563EB&color=fff&bold=true"
                                alt="{{ Auth::user()->name }}" width="32" height="32"
                                class="rounded-circle border">
                            <span class="small fw-semibold text-dark d-none d-sm-inline">{{ Auth::user()->name }}</span>
                            <i class="bi bi-chevron-down text-muted extra-small"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2"
                            aria-labelledby="userDropdown">
                            <li><a class="dropdown-item small" href="#"><i
                                        class="bi kbi-person me-2"></i>Perfil</a>
                            </li>
                            <li><a class="dropdown-item small" href="#"><i class="bi bi-gear me-2"></i>Ajustes</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <!-- Formulario correcto para Logout en Laravel -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item small text-danger d-flex align-items-center w-100">
                                        <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <!-- Menú Desplegable Lateral (Offcanvas Responsive) -->
        <div class="offcanvas offcanvas-start border-0 shadow" tabindex="-1" id="sidebarMenu"
            aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header border-bottom py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <span
                        class="brand-icon bg-primary text-white rounded-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-heart"></i>
                    </span>
                    <h5 class="offcanvas-title fw-bold text-dark h6 mb-0" id="sidebarMenuLabel">Navegación</h5>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-3">
                <div class="text-uppercase text-secondary extra-small fw-semibold px-3 mb-2">Módulos Principales</div>
                <nav class="nav nav-pills flex-column gap-1">
                    <a class="nav-link rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3
    {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-dark' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid-1x2 fs-6"></i>
                        Resumen General
                    </a>
                    <a class="nav-link rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3
    {{ request()->routeIs('admin.user.*') ? 'active' : 'text-dark' }}"
                        href="{{ route('admin.user.index') }}">
                        <i class="bi bi-people fs-6"></i>
                        Usuarios
                    </a>

                    <a class="nav-link text-dark rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3"
                        href="#">
                        <i class="bi bi-diagram-3 fs-6 text-muted"></i> Ministerios
                    </a>
                    <a class="nav-link text-dark rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3"
                        href="#">
                        <i class="bi bi-calendar-week fs-6 text-muted"></i> Programación Mensual
                    </a>
                    <a class="nav-link text-dark rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3"
                        href="#">
                        <i class="bi bi-star fs-6 text-muted"></i> Eventos Especiales
                    </a>
                    <a class="nav-link text-dark rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3"
                        href="#">
                        <i class="bi bi-arrow-repeat fs-6 text-muted"></i> Reemplazos
                    </a>
                </nav>

                <hr class="my-3 opacity-50">

                <div class="text-uppercase text-secondary extra-small fw-semibold px-3 mb-2">Sistema</div>
                <nav class="nav nav-pills flex-column gap-1">
                    <a class="nav-link text-dark rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3"
                        href="#">
                        <i class="bi bi-gear fs-6 text-muted"></i> Configuración
                    </a>
                    <a class="nav-link text-dark rounded-3 small py-2.5 px-3 d-flex align-items-center gap-3"
                        href="#">
                        <i class="bi bi-shield-check fs-6 text-muted"></i> Auditoría &amp; Logs
                    </a>
                </nav>
            </div>
        </div>

    </div>
