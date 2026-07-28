@extends('layouts.app')

@section('contenido')
    @vite(['resources/css/publico/eventos/index.css', 'resources/js/publico/eventos/index.js'])

    <div class="events-panel container max-w-5xl mx-auto px-3 py-4">

        {{-- Header & Month Selector --}}
        <header class="text-lg-center">
            <div class="">
                <h1 class="hero-title">Eventos</h1>
                <p class="hero-subtitle">Agenda programada para el mes actual.</p>
            </div>
            <br>
            <hr>
            <br>

        </header>

        {{-- Minimal Search Bar --}}
        <div class="mb-4">
            <div class="position-relative d-flex align-items-center">
                <i class="bi bi-search position-absolute start-0 ms-3 text-slate-400 fs-7"></i>
                <input type="text" id="eventsSearchInput"
                    class="form-control border-0 bg-light text-slate-900 ps-5 pe-5 rounded-3 fs-7 py-2"
                    placeholder="Buscar eventos por nombre, ministerio o lugar...">
                <button type="button" id="clearEventsSearchBtn"
                    class="btn btn-sm btn-link text-decoration-none text-slate-400 hover-text-slate-600 position-absolute end-0 me-2 d-none">
                    <i class="bi bi-x-circle-fill fs-7"></i>
                </button>
            </div>
        </div>

        {{-- Skeleton Loading --}}
        <div id="eventsSkeleton" class="d-none space-y-4" aria-hidden="true">
            @for ($w = 1; $w <= 2; $w++)
                <div class="mb-4">
                    <div class="placeholder-glow mb-3">
                        <span class="placeholder col-2 rounded-1 py-1"></span>
                    </div>
                    <div class="row g-3">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card border-0 bg-light rounded-3 overflow-hidden">
                                    <div class="skeleton-media bg-slate-200"></div>
                                    <div class="p-3 placeholder-glow space-y-2">
                                        <span class="placeholder col-8 rounded-1"></span>
                                        <span class="placeholder col-11 rounded-1"></span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
        </div>

        {{-- Weekly Events Sections --}}
        <div id="eventsContent">

            {{-- Week 1 --}}
            <section class="week-section mb-5">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <h2 class="fs-7 fw-bold text-uppercase tracking-wider text-slate-400 mb-0">Semana 1</h2>
                    <span class="text-slate-300">•</span>
                    <span class="fs-7 text-slate-500">1 - 7 Agosto</span>
                </div>

                <div class="row g-3">
                    {{-- Event Card 1 --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <article
                            class="card event-card border-0 bg-light rounded-3 h-100 overflow-hidden cursor-pointer hover-lift"
                            tabindex="0" data-title="Congreso de Parejas: Cimientos Firmes" data-category="Conferencia"
                            data-status="Completado" data-date="Sábado, 1 de Agosto" data-time="09:00 AM - 05:00 PM"
                            data-duration="8 horas" data-location="Auditorio Central" data-ministry="Ministerio de Familias"
                            data-organizer="Ps. Roberto & Elena Silva"
                            data-contact="familias@igleplan.org • +57 300 123 4567" data-attendance="180 personas"
                            data-description="Un día entero dedicado a fortalecer la relación matrimonial a través de conferencias, dinámicas de integración y principios bíblicos prácticos."
                            data-notes="Incluye almuerzo ejecutivo, coffee break y libro de trabajo."
                            data-cover="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=800&q=80">

                            <div class="card-media-wrapper position-relative">
                                <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=800&q=80"
                                    alt="Congreso de Parejas" class="card-img-top object-fit-cover">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span
                                        class="badge bg-white text-slate-700 shadow-sm rounded-pill fs-8 fw-normal">Finalizado</span>
                                </div>
                            </div>

                            <div class="card-body p-3 d-flex flex-column">
                                <span class="fs-8 text-primary fw-semibold mb-1">Conferencia</span>
                                <h3 class="fs-7 fw-bold text-slate-900 line-clamp-2 mb-2">Congreso de Parejas: Cimientos
                                    Firmes</h3>

                                <div class="text-slate-500 fs-8 space-y-1 mt-auto">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="bi bi-calendar3"></i>
                                        <span>Sáb, 1 Ago • 09:00 AM</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="bi bi-geo-alt"></i>
                                        <span class="text-truncate">Auditorio Central</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    {{-- Event Card 2 --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <article
                            class="card event-card border-0 bg-light rounded-3 h-100 overflow-hidden cursor-pointer hover-lift"
                            tabindex="0" data-title="Noche de Adoración y Clamor" data-type="Evento Especial"
                            data-category="Vigilia" data-status="Hoy" data-date="Viernes, 7 de Agosto"
                            data-time="08:00 PM - 11:30 PM" data-duration="3.5 horas" data-location="Templo Principal"
                            data-ministry="Alabanza & Intercesión" data-organizer="Min. Andrés Gómez"
                            data-contact="alabanza@igleplan.org" data-attendance="300 personas"
                            data-description="Una noche extendida de adoración íntima, comunión espiritual y tiempo de oración por nuestra ciudad y nación."
                            data-notes="Entrada libre. Se recomienda asistir con ropa cómoda."
                            data-cover="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=800&q=80">

                            <div class="card-media-wrapper position-relative">
                                <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=800&q=80"
                                    alt="Noche de Adoración" class="card-img-top object-fit-cover">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-success text-white rounded-pill fs-8 fw-normal">Hoy</span>
                                </div>
                            </div>

                            <div class="card-body p-3 d-flex flex-column">
                                <span class="fs-8 text-primary fw-semibold mb-1">Vigilia</span>
                                <h3 class="fs-7 fw-bold text-slate-900 line-clamp-2 mb-2">Noche de Adoración y Clamor</h3>

                                <div class="text-slate-500 fs-8 space-y-1 mt-auto">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="bi bi-calendar3"></i>
                                        <span>Vie, 7 Ago • 08:00 PM</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="bi bi-geo-alt"></i>
                                        <span class="text-truncate">Templo Principal</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            {{-- Week 2 --}}
            <section class="week-section mb-5">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <h2 class="fs-7 fw-bold text-uppercase tracking-wider text-slate-400 mb-0">Semana 2</h2>
                    <span class="text-slate-300">•</span>
                    <span class="fs-7 text-slate-500">8 - 14 Agosto</span>
                </div>

                <div class="row g-3">
                    {{-- Event Card 3 --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <article
                            class="card event-card border-0 bg-light rounded-3 h-100 overflow-hidden cursor-pointer hover-lift"
                            tabindex="0" data-title="Jornada de Acción Social y Salud" data-category="Comunitario"
                            data-status="Próximo" data-date="Sábado, 12 de Agosto" data-time="08:00 AM - 01:00 PM"
                            data-duration="5 horas" data-location="Cancha Comunal San José"
                            data-ministry="Ministerio Social" data-organizer="Dna. Carmen Silva"
                            data-contact="accionsocial@igleplan.org" data-attendance="250 beneficiarios"
                            data-description="Atención médica preventiva, entrega de alimentos y actividades recreativas para niños en la comunidad local."
                            data-notes="Se requiere apoyo de voluntarios médicos y de logística desde las 07:00 AM."
                            data-cover="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?auto=format&fit=crop&w=800&q=80">

                            <div class="card-media-wrapper position-relative">
                                <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?auto=format&fit=crop&w=800&q=80"
                                    alt="Jornada de Acción Social" class="card-img-top object-fit-cover">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-slate-800 text-white rounded-pill fs-8 fw-normal">Próximo</span>
                                </div>
                            </div>

                            <div class="card-body p-3 d-flex flex-column">
                                <span class="fs-8 text-primary fw-semibold mb-1">Comunitario</span>
                                <h3 class="fs-7 fw-bold text-slate-900 line-clamp-2 mb-2">Jornada de Acción Social y Salud
                                </h3>

                                <div class="text-slate-500 fs-8 space-y-1 mt-auto">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="bi bi-calendar3"></i>
                                        <span>Sáb, 12 Ago • 08:00 AM</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="bi bi-geo-alt"></i>
                                        <span class="text-truncate">Cancha Comunal San José</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </div>

        {{-- Minimal Empty State --}}
        <div id="eventsEmptyState" class="d-none text-center py-5">
            <i class="bi bi-calendar-x text-slate-300 fs-1 mb-2 d-block"></i>
            <p class="text-slate-600 fs-7 mb-0">Sin eventos programados para este mes.</p>
        </div>

    </div>

    {{-- Clean & Minimal Event Detail Modal --}}
    <div class="modal fade" id="eventDetailModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm rounded-4 overflow-hidden">

                {{-- Header Image Cover --}}
                <div class="modal-cover position-relative bg-light w-100" style="height: 180px;">
                    <img id="modalCover" src="" alt="Imagen del evento" class="w-100 h-100 object-fit-cover">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-none"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                {{-- Modal Body --}}
                <div class="modal-body p-4 space-y-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span id="modalCategory" class="badge bg-light text-slate-700 border fs-8 fw-normal"></span>
                            <span id="modalStatus" class="badge bg-light text-slate-700 border fs-8 fw-normal"></span>
                        </div>
                        <h2 id="modalTitle" class="fs-6 fw-bold text-slate-900 mb-1"></h2>
                        <p id="modalOrganizer" class="fs-8 text-slate-500 mb-0"></p>
                    </div>

                    <p id="modalDescription" class="fs-7 text-slate-600 leading-relaxed mb-0"></p>

                    {{-- Clean Information List --}}
                    <div class="pt-3 border-top space-y-2 fs-7">
                        <div class="d-flex justify-content-between text-slate-600">
                            <span class="text-slate-400">Fecha y hora</span>
                            <span id="modalDate" class="fw-medium text-end"></span>
                        </div>
                        <div class="d-flex justify-content-between text-slate-600">
                            <span class="text-slate-400">Duración</span>
                            <span id="modalDuration" class="fw-medium text-end"></span>
                        </div>
                        <div class="d-flex justify-content-between text-slate-600">
                            <span class="text-slate-400">Ubicación</span>
                            <span id="modalLocation" class="fw-medium text-end"></span>
                        </div>
                        <div class="d-flex justify-content-between text-slate-600">
                            <span class="text-slate-400">Ministerio</span>
                            <span id="modalMinistry" class="fw-medium text-end"></span>
                        </div>
                        <div class="d-flex justify-content-between text-slate-600">
                            <span class="text-slate-400">Contacto</span>
                            <span id="modalContact" class="fw-medium text-end"></span>
                        </div>
                        <div class="d-flex justify-content-between text-slate-600">
                            <span class="text-slate-400">Aforo</span>
                            <span id="modalAttendance" class="fw-medium text-end"></span>
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div class="pt-2">
                        <p id="modalNotes" class="fs-8 text-slate-500 bg-light p-2.5 rounded-2 mb-0 border-0"></p>
                    </div>
                </div>

                <div class="modal-footer border-0 p-3 bg-light d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-slate text-slate-700 border bg-white rounded-2 px-3 fs-7"
                        data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
