@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin/ministerios/index.css', 'resources/js/admin/ministerios/index.js'])
@endpush

@section('contenido')
    <div class="ministries-management-container container-fluid px-4 py-4">

        <!-- PAGE HEADER -->
        <header class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h1 class="h3 fw-bold text-slate-900 mb-1">Gestión de Ministerios</h1>
                <p class="text-slate-500 mb-0 small">Administra los departamentos, áreas de servicio y sus respectivos
                    líderes.</p>
            </div>
            <div>
                <button type="button"
                    class="btn btn-primary d-inline-flex align-items-center gap-2 rounded-pill px-4 py-2 shadow-sm fs-6"
                    data-bs-toggle="modal" data-bs-target="#createMinistryModal">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>Nuevo Ministerio</span>
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
                            <i class="bi bi-diagram-3-fill fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Total Ministerios</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">12</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card kpi-card border-0 rounded-xl shadow-sm h-100 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="kpi-icon-wrapper bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-check-circle-fill fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Ministerios Activos</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card kpi-card border-0 rounded-xl shadow-sm h-100 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="kpi-icon-wrapper bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-x-circle-fill fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small fw-medium d-block">Ministerios Inactivos</span>
                            <h2 class="h3 fw-bold text-slate-900 mb-0 mt-1">10</h2>
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
                            placeholder="Buscar por ministerio, descripción...">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <select id="statusFilter" class="form-select text-slate-700 shadow-none">
                        <option value="">Todos los Estados</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-grid">
                    <button type="button" id="btnClearFilters"
                        class="btn btn-light border text-slate-600 rounded-pill d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-x-circle"></i>
                        <span>Limpiar filtros</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- MAIN MINISTRIES TABLE CONTAINER -->
        <section id="tableContainer" class="card border-0 rounded-xl shadow-sm overflow-hidden mb-4">
            <div class="table-responsive custom-scrollbar position-relative" style="max-height: 640px;">
                <table class="table align-middle text-nowrap custom-table mb-0">
                    <thead class="sticky-top bg-light border-bottom">
                        <tr>
                            <th scope="col" class="ps-4 text-slate-500 fw-semibold text-uppercase extra-small">Ministerio
                            </th>
                          
                            <th scope="col" class="text-slate-500 fw-semibold text-uppercase extra-small">Estado</th>
                            <th scope="col" class="pe-4 text-end text-slate-500 fw-semibold text-uppercase extra-small">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ministriesTableBody">
                        <tr data-ministry-id="1" data-name="Alabanza y Adoración"  data-status="Activo"
                            data-description="Coordinación de músicos, directores de alabanza y coro para los servicios generales.">
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="ministry-icon-avatar bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-music-note-beamed fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-slate-900 d-block">Alabanza y Adoración</span>
                                        <span class="text-slate-500 extra-small">Área de Servicios Generales</span>
                                    </div>
                                </div>
                            </td>
                         
                            <td><span
                                    class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-medium">Activo</span>
                            </td>
                            <td class="pe-4 text-end">
                                <div class="d-inline-flex gap-1">
                                    <button type="button" class="btn btn-action-icon btn-view" data-bs-toggle="tooltip"
                                        data-bs-title="Ver Detalle"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-action-icon btn-edit" data-bs-toggle="tooltip"
                                        data-bs-title="Editar Ministerio"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-action-icon btn-delete text-danger"
                                        data-bs-toggle="tooltip" data-bs-title="Eliminar"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                      
                    </tbody>
                </table>
            </div>
        </section>

        <!-- EMPTY STATE CONTAINER -->
        <div id="emptyState" class="card border-0 rounded-xl shadow-sm p-5 text-center d-none">
            <div class="py-4">
                <div
                    class="empty-state-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                    <i class="bi bi-diagram-3 text-slate-400 display-5"></i>
                </div>
                <h3 class="h5 fw-bold text-slate-900 mb-1">No hay ministerios registrados</h3>
                <p class="text-slate-500 small mb-4">Cuando registres nuevos ministerios o ajustes los filtros aparecerán
                    aquí.</p>
                <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-4" id="btnResetSearch">
                    Restablecer Búsqueda
                </button>
            </div>
        </div>

    </div>

    <!-- MODAL: VER DETALLE DE MINISTERIO -->
    <div class="modal fade" id="viewMinistryModal" tabindex="-1" aria-labelledby="viewMinistryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-xl shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-slate-900" id="viewMinistryModalLabel">Detalle del Ministerio</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <div class="d-inline-flex p-3 bg-primary-subtle text-primary rounded-circle mb-3">
                        <i class="bi bi-diagram-3-fill fs-2"></i>
                    </div>
                    <h3 id="viewMinistryName" class="h4 fw-bold text-slate-900 mb-1"></h3>
                    <div id="viewMinistryStatusBadge" class="mb-4"></div>

                    <div class="bg-light p-3 rounded-3 text-start mb-3">
                        <p id="viewMinistryDescription" class="text-slate-600 small mb-0"></p>
                    </div>

                    
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center">
                    <button type="button" class="btn btn-slate border px-4 rounded-pill small"
                        data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: CREAR / EDITAR MINISTERIO -->
    <div class="modal fade" id="editMinistryModal" tabindex="-1" aria-labelledby="editMinistryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-xl shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-slate-900" id="editMinistryModalLabel">Editar Ministerio</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="editMinistryForm">
                    <div class="modal-body p-4 pt-0">
                        <input type="hidden" id="editMinistryId">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="editMinistryName" class="form-label small fw-semibold text-slate-700">Nombre
                                    del Ministerio</label>
                                <input type="text" class="form-control shadow-none" id="editMinistryName" required>
                            </div>
                          
                            <div class="col-6">
                                <label for="editMinistryStatus"
                                    class="form-label small fw-semibold text-slate-700">Estado</label>
                                <select class="form-select shadow-none" id="editMinistryStatus" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="editMinistryDescription"
                                    class="form-label small fw-semibold text-slate-700">Descripción</label>
                                <textarea class="form-control shadow-none" id="editMinistryDescription" rows="3"></textarea>
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
    <div class="modal fade" id="deleteMinistryModal" tabindex="-1" aria-labelledby="deleteMinistryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 rounded-xl shadow-lg text-center p-3">
                <div class="modal-body">
                    <div class="text-danger mb-3">
                        <i class="bi bi-exclamation-triangle display-4"></i>
                    </div>
                    <h5 class="fw-bold text-slate-900 mb-2">Eliminar Ministerio</h5>
                    <p class="text-slate-500 small mb-4">¿Está seguro de eliminar este ministerio?</p>
                    <input type="hidden" id="deleteMinistryId">
                    <div class="d-grid gap-2">
                        <button type="button" id="btnConfirmDelete" class="btn btn-danger rounded-pill">Eliminar
                            Ministerio</button>
                        <button type="button" class="btn btn-light text-slate-600 rounded-pill border"
                            data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
