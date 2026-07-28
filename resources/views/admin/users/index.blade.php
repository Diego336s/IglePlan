@extends('layouts.app')
@push('styles')
    @vite(['resources/css/admin/users/index.css', 'resources/js/admin/users/index.js'])
@endpush


@section('contenido')
    <div class="users-management-container container container-fluid px-4 py-4">

        <!-- PAGE HEADER -->
        <header class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h1 class="h3 fw-bold text-slate-900 mb-1">Administración de Usuarios</h1>
                <p class="text-slate-500 mb-0 small">Gestiona todos los usuarios registrados en la plataforma.</p>
            </div>
            <div>
                <button type="button"
                    class="btn btn-primary d-inline-flex align-items-center gap-2 rounded-pill px-4 py-2 shadow-sm fs-6"
                    data-bs-toggle="modal" data-bs-target="#createUserModal">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Registrar Usuario</span>
                </button>
            </div>
        </header>

        <!-- KPI SUMMARY CARDS -->
        <section class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card kpi-card border-0 rounded-xl shadow-sm h-100 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="kpi-icon-wrapper bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Total Usuarios</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">1,248</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card kpi-card border-0 rounded-xl shadow-sm h-100 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="kpi-icon-wrapper bg-purple-subtle text-purple rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-shield-lock-fill fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Super Administradores</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">4</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card kpi-card border-0 rounded-xl shadow-sm h-100 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="kpi-icon-wrapper bg-blue-subtle text-blue rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-book-half fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Pastores</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">38</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card kpi-card border-0 rounded-xl shadow-sm h-100 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="kpi-icon-wrapper bg-amber-subtle text-amber rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-badge-fill fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Líderes</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">186</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SEARCH AND FILTERS TOOLBAR -->
        <section class="card border-0 rounded-xl shadow-sm p-3 mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="input-group search-input-group">
                        <span class="input-group-text bg-transparent border-end-0 text-slate-400 ps-3">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="searchInput" class="form-control border-start-0 ps-0 shadow-none"
                            placeholder="Buscar por nombre, correo, teléfono...">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <select id="roleFilter" class="form-select text-slate-700 shadow-none">
                        <option value="">Todos los Roles</option>
                        <option value="Super Administrador">Super Administrador</option>
                        <option value="Pastor">Pastor</option>
                        <option value="Líder">Líder</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <select id="statusFilter" class="form-select text-slate-700 shadow-none">
                        <option value="">Todos los Estados</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                        <option value="Suspendido">Suspendido</option>
                    </select>
                </div>
                <div class="col-12 col-lg-2 d-grid">
                    <button type="button" id="btnClearFilters"
                        class="btn btn-light border text-slate-600 rounded-pill d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-x-circle"></i>
                        <span>Limpiar filtros</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- LOADING STATE (SKELETON) -->
        <div id="loadingSkeleton" class="card border-0 rounded-xl shadow-sm p-4 d-none">
            <div class="placeholder-glow">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <span class="placeholder col-3 py-3 rounded-3"></span>
                    <span class="placeholder col-2 py-3 rounded-3"></span>
                </div>
                <div class="placeholder col-12 py-2 mb-2 rounded-2"></div>
                <div class="placeholder col-12 py-2 mb-2 rounded-2"></div>
                <div class="placeholder col-12 py-2 mb-2 rounded-2"></div>
                <div class="placeholder col-12 py-2 mb-2 rounded-2"></div>
                <div class="placeholder col-12 py-2 mb-2 rounded-2"></div>
            </div>
        </div>

        <!-- MAIN USERS TABLE CONTAINER -->
        <section id="tableContainer" class="card border-0 rounded-xl shadow-sm overflow-hidden mb-4">
            <div class="table-responsive custom-scrollbar position-relative" style="max-height: 640px;">
                <table class="table align-middle text-nowrap custom-table mb-0">
                    <thead class="sticky-top bg-light border-bottom">
                        <tr>
                            <th scope="col" class="ps-4 text-slate-500 fw-semibold text-uppercase extra-small">Avatar
                            </th>
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Nombre Completo
                            </th>
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Correo
                                Electrónico</th>
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Teléfono</th>
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Rol</th>
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Estado</th>
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Fecha de
                                Registro</th>
                            <th scope="col" class="pe-4 text-end text-slate-500 fw-semibold text-uppercase extra-small">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @forelse ($users as $user)
                            <tr data-user-id="101" data-first-name="Carlos" data-last-name="Mendoza"
                                data-email="carlos.mendoza@igleplan.com" data-phone="+57 300 123 4567"
                                data-role="Super Administrador" data-status="Activo" data-reg-date="12 Ene 2024"
                                data-last-login="Hace 10 minutos">
                                <td class="ps-4">
                                    <img src="https://ui-avatars.com/api/?name={{$user->name}}&background=2563EB&color=fff&bold=true"
                                        alt="{{$user->name}}" class="rounded-circle border" width="38"
                                        height="38">
                                </td>
                                <td class="fw-semibold text-slate-900">{{$user->name}} {{$user->last_name}}</td>
                                <td class="text-slate-600">{{$user->email}}</td>
                                <td class="text-slate-600">{{$user->telefono}}</td>
                                <td><span
                                        class="badge bg-purple-subtle text-purple border border-purple-subtle px-3 py-2 rounded-pill fw-medium">{{$user->rol->rol}}</span></td>
                                <td><span
                                        class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-medium">Activo</span>
                                </td>
                                <td class="text-slate-500">{{$user->created_at}}</td>
                                <td class="pe-4 text-end">
                                    <div class="d-inline-flex gap-1">
                                        <button type="button" class="btn btn-action-icon btn-view"
                                            data-bs-toggle="tooltip" data-bs-title="Ver Detalle"><i
                                                class="bi bi-eye"></i></button>
                                        <button type="button" class="btn btn-action-icon btn-edit"
                                            data-bs-toggle="tooltip" data-bs-title="Editar Usuario"><i
                                                class="bi bi-pencil"></i></button>
                                        <button type="button" class="btn btn-action-icon btn-delete text-danger"
                                            data-bs-toggle="tooltip" data-bs-title="Eliminar"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                </table>
            </div>
        </section>

        <!-- EMPTY STATE CONTAINER -->
        <div id="emptyState" class="card border-0 rounded-xl shadow-sm p-5 text-center d-none">
            <div class="py-4">
                <div
                    class="empty-state-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                    <i class="bi bi-people text-slate-400 display-5"></i>
                </div>
                <h3 class="h5 fw-bold text-slate-900 mb-1">No hay usuarios registrados</h3>
                <p class="text-slate-500 small mb-4">Cuando registres usuarios o coincidan con la búsqueda aparecerán aquí.
                </p>
                <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-4" id="btnResetSearch">
                    Restablecer Búsqueda
                </button>
            </div>
        </div>

    </div>

    <!-- MODAL: VER DETALLE DE USUARIO -->
    <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-xl shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-slate-900" id="viewUserModalLabel">Detalles del Usuario</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <img id="viewUserAvatar" src="" alt="Avatar" class="rounded-circle border mb-3 shadow-sm"
                        width="80" height="80">
                    <h3 id="viewUserName" class="h4 fw-bold text-slate-900 mb-1"></h3>
                    <div id="viewUserRoleBadge" class="mb-4"></div>

                    <div class="bg-light p-3 rounded-3 text-start">
                        <div class="row g-3">
                            <div class="col-6">
                                <span class="text-slate-400 extra-small d-block text-uppercase fw-semibold">Correo
                                    Electrónico</span>
                                <span id="viewUserEmail" class="text-slate-800 small fw-medium text-break"></span>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 extra-small d-block text-uppercase fw-semibold">Teléfono</span>
                                <span id="viewUserPhone" class="text-slate-800 small fw-medium"></span>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 extra-small d-block text-uppercase fw-semibold">Fecha de
                                    Registro</span>
                                <span id="viewUserRegDate" class="text-slate-800 small fw-medium"></span>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 extra-small d-block text-uppercase fw-semibold">Último
                                    Acceso</span>
                                <span id="viewUserLastLogin" class="text-slate-800 small fw-medium"></span>
                            </div>
                            <div class="col-12">
                                <span class="text-slate-400 extra-small d-block text-uppercase fw-semibold">Estado de la
                                    cuenta</span>
                                <span id="viewUserStatusBadge"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center">
                    <button type="button" class="btn btn-slate border px-4 rounded-pill small"
                        data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: EDITAR USUARIO -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-xl shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-slate-900" id="editUserModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="editUserForm">
                    <div class="modal-body p-4 pt-0">
                        <input type="hidden" id="editUserId">
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="editFirstName"
                                    class="form-label small fw-semibold text-slate-700">Nombre</label>
                                <input type="text" class="form-control shadow-none" id="editFirstName" required>
                            </div>
                            <div class="col-6">
                                <label for="editLastName"
                                    class="form-label small fw-semibold text-slate-700">Apellido</label>
                                <input type="text" class="form-control shadow-none" id="editLastName" required>
                            </div>
                            <div class="col-12">
                                <label for="editEmail" class="form-label small fw-semibold text-slate-700">Correo
                                    Electrónico</label>
                                <input type="email" class="form-control shadow-none" id="editEmail" required>
                            </div>
                            <div class="col-12">
                                <label for="editPhone"
                                    class="form-label small fw-semibold text-slate-700">Teléfono</label>
                                <input type="text" class="form-control shadow-none" id="editPhone" required>
                            </div>
                            <div class="col-6">
                                <label for="editRole" class="form-label small fw-semibold text-slate-700">Rol</label>
                                <select class="form-select shadow-none" id="editRole" required>
                                    <option value="Super Administrador">Super Administrador</option>
                                    <option value="Pastor">Pastor</option>
                                    <option value="Líder">Líder</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="editStatus" class="form-label small fw-semibold text-slate-700">Estado</label>
                                <select class="form-select shadow-none" id="editStatus" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="Suspendido">Suspendido</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light border text-slate-600 rounded-pill px-4"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL: ELIMINAR CONFIRMACIÓN -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 rounded-xl shadow-lg text-center p-3">
                <div class="modal-body">
                    <div class="text-danger mb-3">
                        <i class="bi bi-exclamation-triangle display-4"></i>
                    </div>
                    <h5 class="fw-bold text-slate-900 mb-2">Eliminar Usuario</h5>
                    <p class="text-slate-500 small mb-4">¿Está seguro de eliminar este usuario?</p>
                    <input type="hidden" id="deleteUserId">
                    <div class="d-grid gap-2">
                        <button type="button" id="btnConfirmDelete" class="btn btn-danger rounded-pill">Eliminar
                            Usuario</button>
                        <button type="button" class="btn btn-light text-slate-600 rounded-pill border"
                            data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
