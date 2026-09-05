@extends('layouts.app')

@push('styles')
    @vite(['resources\css\home\dashboards\dashboard.css'])
@endpush

@section('contenido')
    <div class="dashboard-minimal-wrapper container container-fluid px-2 px-sm-3 px-md-4 py-2 py-md-3">

         @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('error') }}
                    </div>
                @endif

        <!-- Header Breve -->
        <header class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mb-3 mb-md-4">
            <div>
                <h1 class="h4 fw-bold text-dark mb-1">Visión General</h1>
                <p class="text-secondary small mb-0">Estado operativo global de la plataforma.</p>
            </div>
            <div class="align-self-start align-self-sm-auto">
                <span class="badge bg-white text-dark border px-3 py-2 rounded-3 shadow-sm font-monospace extra-small">
                    <i class="bi bi-calendar3 me-1 text-primary"></i> 28 Jul, 2026
                </span>
            </div>
        </header>

        <!-- Grid Métricas Totalmente Responsive (12/6/4/3 cols) -->
        <section class="mb-3 mb-md-4">
            <div class="row g-2 g-sm-3">
               

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Pastores</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">28</span>
                            <span class="text-muted extra-small">Activos</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Líderes</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">112</span>
                            <span class="text-success extra-small"><i class="bi bi-arrow-up-short"></i>+15%</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Ministerios</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">36</span>
                            <span class="text-muted extra-small">36/36</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Usuarios Totales</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">1,480</span>
                            <span class="text-success extra-small"><i class="bi bi-arrow-up-short"></i>+22%</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Eventos Mes</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">18</span>
                            <span class="text-muted extra-small">Agendados</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Cultos Programados</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">64</span>
                            <span class="text-success extra-small">100%</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div
                        class="card border-0 bg-white p-3 rounded-4 shadow-sm metric-card border-start border-3 border-warning">
                        <span class="text-secondary extra-small text-uppercase fw-semibold">Reemplazos</span>
                        <div class="d-flex align-items-baseline justify-content-between mt-1">
                            <span class="h3 fw-bold text-dark mb-0">5</span>
                            <span class="text-warning-emphasis extra-small fw-semibold">Pendientes</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Layout 2 Columnas Adaptable -->
        <div class="row g-3">
            <!-- Columna Principal -->
            <div class="col-12 col-lg-8">

                <!-- Tabla Usuarios Recientes -->
                <div class="card border-0 bg-white p-3 p-sm-4 rounded-4 shadow-sm mb-3">
                    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mb-3">
                        <h2 class="h6 fw-bold text-dark mb-0">Usuarios Recientes</h2>
                        <input type="text" id="userSearchInput"
                            class="form-control form-control-sm rounded-3 max-w-sm" placeholder="Buscar usuario...">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-top mb-0" id="usersTable">
                            <thead>
                                <tr class="text-secondary extra-small text-uppercase">
                                    <th class="border-0">Usuario</th>
                                    <th class="border-0">Rol</th>
                                    <th class="border-0 d-none d-sm-table-cell">Fecha</th>
                                    <th class="border-0 text-end">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name=Carlos+Mendoza&background=2563EB&color=fff"
                                                class="rounded-circle flex-shrink-0" width="28" height="28"
                                                alt="">
                                            <div class="text-truncate" style="max-width: 150px;">
                                                <div class="fw-semibold text-dark text-truncate">Carlos Mendoza</div>
                                                <div class="extra-small text-muted text-truncate">
                                                    carlos.mendoza@iglesia.org</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Pastor</span></td>
                                    <td class="text-muted d-none d-sm-table-cell">28 Jul, 2026</td>
                                    <td class="text-end"><span class="badge bg-success-subtle text-success">Activo</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name=Mariana+Rios&background=3B82F6&color=fff"
                                                class="rounded-circle flex-shrink-0" width="28" height="28"
                                                alt="">
                                            <div class="text-truncate" style="max-width: 150px;">
                                                <div class="fw-semibold text-dark text-truncate">Mariana Ríos</div>
                                                <div class="extra-small text-muted text-truncate">m.rios@iglesia.org</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Líder</span></td>
                                    <td class="text-muted d-none d-sm-table-cell">27 Jul, 2026</td>
                                    <td class="text-end"><span class="badge bg-success-subtle text-success">Activo</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Actividad Reciente -->
                <div class="card border-0 bg-white p-3 p-sm-4 rounded-4 shadow-sm mb-3 mb-lg-0">
                    <h2 class="h6 fw-bold text-dark mb-3">Actividad del Sistema</h2>

                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                        <li class="d-flex gap-2 gap-sm-3 align-items-start small">
                            <i class="bi bi-circle-fill text-primary mt-1 extra-small flex-shrink-0"></i>
                            <div>
                                <span class="fw-semibold text-dark">Nuevo usuario registrado:</span> Carlos Mendoza como
                                Pastor.
                                <div class="extra-small text-muted">Hace 20 minutos</div>
                            </div>
                        </li>
                        <li class="d-flex gap-2 gap-sm-3 align-items-start small">
                            <i class="bi bi-circle-fill text-success mt-1 extra-small flex-shrink-0"></i>
                            <div>
                                <span class="fw-semibold text-dark">Ministerio creado:</span> Medios &amp; Streaming en
                                Sede Central.
                                <div class="extra-small text-muted">Ayer a las 04:20 PM</div>
                            </div>
                        </li>
                        <li class="d-flex gap-2 gap-sm-3 align-items-start small">
                            <i class="bi bi-circle-fill text-warning mt-1 extra-small flex-shrink-0"></i>
                            <div>
                                <span class="fw-semibold text-dark">Solicitud de reemplazo:</span> Daniel Ríos solicitó
                                cambio para el 2 de Agosto.
                                <div class="extra-small text-muted">Hace 1 día</div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Columna Lateral -->
            <div class="col-12 col-lg-4">

                <!-- Notificaciones -->
                <div class="card border-0 bg-white p-3 p-sm-4 rounded-4 shadow-sm mb-3">
                    <h2 class="h6 fw-bold text-dark mb-3 d-flex align-items-center justify-content-between">
                        <span>Notificaciones</span>
                        <span class="badge bg-primary rounded-pill extra-small">4</span>
                    </h2>

                    <div class="d-flex flex-column gap-2">
                        <div class="p-2 rounded-3 bg-light border-start border-3 border-primary small">
                            <div class="fw-semibold text-dark">Pastor Asignado</div>
                            <div class="extra-small text-muted">Roberto Silva en Sede Occidente.</div>
                        </div>
                        <div class="p-2 rounded-3 bg-light border-start border-3 border-warning small">
                            <div class="fw-semibold text-dark">Reemplazo Urgente</div>
                            <div class="extra-small text-muted">Revisar solicitud en sonido.</div>
                        </div>
                    </div>
                </div>

                <!-- Estado Infraestructura -->
                <div class="card border-0 bg-white p-3 p-sm-4 rounded-4 shadow-sm">
                    <h2 class="h6 fw-bold text-dark mb-3">Estado del Servicio</h2>

                    <div class="d-flex flex-column gap-2 extra-small">
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                            <span class="text-secondary"><i class="bi bi-database me-1"></i> Base de datos</span>
                            <span class="text-success fw-semibold">Operativo</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                            <span class="text-secondary"><i class="bi bi-envelope me-1"></i> Emails</span>
                            <span class="text-success fw-semibold">Activo</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                            <span class="text-secondary"><i class="bi bi-cloud me-1"></i> Backup</span>
                            <span class="text-dark fw-semibold">Hoy, 03:00 AM</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    @vite(['resources\js\home\dashboards\dashboard.js'])
@endpush
