@extends('layouts.app')

@section('contenido')
    @vite(['resources/css/publico/programa/index.css', 'resources/js/publico/programa/index.js'])
    <div class="schedule-panel container px-3 px-md-0 max-w-5xl mx-auto py-4">

        {{-- Header --}}
        <header class="text-lg-center">
            <div>
                <h1 class="hero-title">Programación Mensual</h1>
                <p class="hero-subtitle">Cultos y eventos programados.</p>
            </div>
            <br>
            <hr>
            <br>
        </header>

        {{-- Buscador Simplificado --}}
        <div class="mb-5">
            <div class="position-relative d-flex align-items-center">
                <i class="bi bi-search position-absolute start-0 ms-3 text-slate-400 fs-7"></i>
                <input type="text" id="scheduleSearchInput"
                    class="form-control border-0 bg-light text-slate-900 ps-5 pe-5 py-2 rounded-3 fs-7"
                    placeholder="Buscar por actividad, responsable o fecha...">
                <button type="button" id="clearSearchBtn"
                    class="btn btn-sm btn-link text-decoration-none text-slate-500 position-absolute end-0 me-2 d-none">
                    Limpiar
                </button>
            </div>
        </div>

        {{-- Loading Skeleton --}}
        <div id="scheduleSkeleton" class="d-none space-y-4" aria-hidden="true">
            @for ($w = 1; $w <= 2; $w++)
                <div class="mb-4">
                    <div class="placeholder-glow mb-3">
                        <span class="placeholder col-2 rounded-2 py-2"></span>
                    </div>
                    <div class="row g-3">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="p-3 bg-light rounded-3">
                                    <div class="placeholder-glow space-y-2">
                                        <span class="placeholder col-4 rounded-1"></span>
                                        <span class="placeholder col-10 rounded-2 py-2"></span>
                                        <span class="placeholder col-8 rounded-1"></span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
        </div>

        {{-- Secciones Semanales --}}
        <div id="scheduleContent">

            {{-- Semana 1 --}}
            <section class="week-section mb-5">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <h2 class="fs-6 fw-bold text-slate-800 mb-0">Semana 1</h2>
                    <span class="text-slate-400 fs-8">• 1 - 7 Agosto</span>
                </div>

                <div class="row g-3">
                    {{-- Card 1 --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <article
                            class="activity-card p-3 rounded-3 bg-white border border-slate-100 hover-shadow transition-all h-100 d-flex flex-column"
                            tabindex="0" data-title="Culto Dominical de Celebración" data-type="Culto"
                            data-status="Completado" data-date="Domingo, 2 de Agosto" data-time="10:00 AM - 12:00 PM"
                            data-duration="2 horas" data-location="Templo Principal" data-ministry="Ministerio de Alabanza"
                            data-leader="Ps. Juan Martínez" data-theme="Fe que mueve montañas"
                            data-description="Tiempo especial de alabanza, adoración y enseñanza de la Palabra enfocado en fortalecer la confianza en Dios."
                            data-participants="Familia congregacional y visitantes generales"
                            data-notes="Transmitido en vivo por el canal oficial de YouTube."
                            data-cover="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?auto=format&fit=crop&w=800&q=80">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase tracking-wider fw-bold text-slate-400 fs-8">Culto</span>
                                <span class="text-slate-400 fs-8">Completado</span>
                            </div>

                            <h3 class="fs-7 fw-semibold text-slate-900 text-truncate mb-1">Culto Dominical de Celebración
                            </h3>
                            <p class="text-slate-500 fs-8 line-clamp-2 mb-3 flex-grow-1">Tiempo especial de alabanza,
                                adoración y enseñanza de la Palabra.</p>

                            <div class="text-slate-500 fs-8 space-y-1">
                                <div>Dom, 2 Ago • 10:00 AM</div>
                                <div class="text-truncate">Templo Principal</div>
                            </div>
                        </article>
                    </div>

                    {{-- Card 2 --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <article
                            class="activity-card p-3 rounded-3 bg-white border border-slate-100 hover-shadow transition-all h-100 d-flex flex-column"
                            tabindex="0" data-title="Taller de Liderazgo Juvenil" data-type="Evento Especial"
                            data-status="Hoy" data-date="Miércoles, 5 de Agosto" data-time="06:30 PM - 08:30 PM"
                            data-duration="2 horas" data-location="Salón Comunitario B"
                            data-ministry="Ministerio de Jóvenes" data-leader="Min. Andrés Gómez"
                            data-theme="Servicio con propósito"
                            data-description="Capacitación práctica orientada a nuevos líderes de células y equipos de trabajo juvenil para el desarrollo de competencias."
                            data-participants="Líderes de células y mentores juveniles"
                            data-notes="Incluye material impreso y refrigerio al finalizar."
                            data-cover="https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=800&q=80">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase tracking-wider fw-bold text-slate-400 fs-8">Evento</span>
                                <span class="fw-semibold text-success fs-8">Hoy</span>
                            </div>

                            <h3 class="fs-7 fw-semibold text-slate-900 text-truncate mb-1">Taller de Liderazgo Juvenil</h3>
                            <p class="text-slate-500 fs-8 line-clamp-2 mb-3 flex-grow-1">Capacitación práctica orientada a
                                nuevos líderes de células.</p>

                            <div class="text-slate-500 fs-8 space-y-1">
                                <div>Mié, 5 Ago • 06:30 PM</div>
                                <div class="text-truncate">Salón Comunitario B</div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            {{-- Semana 2 --}}
            <section class="week-section mb-5">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <h2 class="fs-6 fw-bold text-slate-800 mb-0">Semana 2</h2>
                    <span class="text-slate-400 fs-8">• 8 - 14 Agosto</span>
                </div>

                <div class="row g-3">
                    {{-- Card 3 --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <article
                            class="activity-card p-3 rounded-3 bg-white border border-slate-100 hover-shadow transition-all h-100 d-flex flex-column"
                            tabindex="0" data-title="Reunión General de Oración" data-type="Culto" data-status="Próximo"
                            data-date="Jueves, 13 de Agosto" data-time="07:00 PM - 08:30 PM" data-duration="1.5 horas"
                            data-location="Templo Principal" data-ministry="Intercesión" data-leader="Dna. Carmen Silva"
                            data-theme="Perseverancia en el clamor"
                            data-description="Espacio intercesor para orar por las necesidades de las familias, sanidad de los enfermos y la comunidad local."
                            data-participants="Abierto a todo público"
                            data-notes="Asistir con Biblia y libreta de apuntes."
                            data-cover="https://images.unsplash.com/photo-1544427920-c49ccfb85579?auto=format&fit=crop&w=800&q=80">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase tracking-wider fw-bold text-slate-400 fs-8">Culto</span>
                                <span class="text-slate-400 fs-8">Próximo</span>
                            </div>

                            <h3 class="fs-7 fw-semibold text-slate-900 text-truncate mb-1">Reunión General de Oración</h3>
                            <p class="text-slate-500 fs-8 line-clamp-2 mb-3 flex-grow-1">Espacio intercesor para orar por
                                las necesidades de la comunidad.</p>

                            <div class="text-slate-500 fs-8 space-y-1">
                                <div>Jue, 13 Ago • 07:00 PM</div>
                                <div class="text-truncate">Templo Principal</div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </div>

        {{-- Empty State --}}
        <div id="scheduleEmptyState" class="d-none text-center py-5 px-3">
            <p class="fs-7 text-slate-700 fw-semibold mb-1">No hay actividades programadas para este mes.</p>
            <p class="text-slate-400 fs-8 mb-0">Selecciona otro mes para consultar la agenda.</p>
        </div>

    </div>

    {{-- Modal de Consulta --}}
    <div class="modal fade" id="activityDetailModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm rounded-4 overflow-hidden">

                {{-- Modal Header Cover --}}
                <div class="modal-cover position-relative bg-light w-100" style="height: 180px;">
                    <img id="modalCover" src="" alt="Imagen de la actividad"
                        class="w-100 h-100 object-fit-cover">
                    <div class="position-absolute top-0 start-0 p-3 d-flex gap-2">
                        <span id="modalType" class="badge bg-white text-dark shadow-sm fs-8 fw-semibold"></span>
                        <span id="modalStatus" class="badge bg-white text-dark shadow-sm fs-8 fw-semibold"></span>
                    </div>
                </div>

                {{-- Modal Body --}}
                <div class="modal-body p-4 space-y-4">
                    <div>
                        <h2 id="modalTitle" class="fs-5 fw-bold text-slate-900 mb-1"></h2>
                        <p id="modalTheme" class="fs-7 fw-medium text-slate-500 mb-0"></p>
                    </div>

                    <p id="modalDescription" class="fs-7 text-slate-600 mb-0"></p>

                    {{-- Information Grid --}}
                    <div class="py-3 border-top border-bottom text-xs">
                        <div class="row g-3">
                            <div class="col-6">
                                <span class="text-slate-400 d-block mb-1">Fecha y Hora</span>
                                <p id="modalDate" class="fw-medium text-slate-800 mb-0"></p>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 d-block mb-1">Duración</span>
                                <p id="modalDuration" class="fw-medium text-slate-800 mb-0"></p>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 d-block mb-1">Ubicación</span>
                                <p id="modalLocation" class="fw-medium text-slate-800 mb-0"></p>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 d-block mb-1">Ministerio</span>
                                <p id="modalMinistry" class="fw-medium text-slate-800 mb-0"></p>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 d-block mb-1">Responsable</span>
                                <p id="modalLeader" class="fw-medium text-slate-800 mb-0"></p>
                            </div>
                            <div class="col-6">
                                <span class="text-slate-400 d-block mb-1">Audiencia</span>
                                <p id="modalParticipants" class="fw-medium text-slate-800 mb-0"></p>
                            </div>
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div class="space-y-2">
                        <div>
                            <span class="fs-8 fw-semibold text-slate-400 d-block mb-1">Notas</span>
                            <p id="modalNotes" class="fs-7 text-slate-600 mb-0"></p>
                        </div>

                        <div>
                            <span class="fs-8 fw-semibold text-slate-400 d-block mb-1">Adjuntos</span>
                            <div id="modalFiles" class="d-flex align-items-center gap-2 fs-7 text-slate-600">
                                <i class="bi bi-paperclip text-slate-400"></i>
                                <span>Guía_de_Orden_del_Culto.pdf</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="modal-footer border-0 p-3 bg-light">
                    <button type="button" class="btn btn-sm btn-secondary px-4 rounded-2" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
