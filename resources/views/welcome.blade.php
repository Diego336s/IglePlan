@extends('layouts.app')
@push('styles')
     @vite(['resources/css/welcome.css']) 
@endpush
@section('contenido')
  

    <main class="main-container">

        {{-- Hero Section --}}
        <section class="hero-section">
            <h1 class="hero-title">
                Bienvenido a <span class="text-primary">IglePlan</span>
            </h1>
            <p class="hero-subtitle">
                Comunidad de fe comprometida con el crecimiento espiritual y el servicio a Dios y a los demás.
            </p>
        </section>

        {{-- Próximos Cultos --}}
        <section class="schedule-section">
            <div class="section-header">
                <span class="section-tag">Próximos</span>
                <h2 class="section-title">Cultos y Actividades</h2>
            </div>

            <div class="services-grid">
                {{-- Tarjeta 1 --}}
                <article class="service-card">
                    <div class="service-badge">Dominical</div>
                    <h3 class="service-name">Culto de Celebración</h3>
                    <p class="service-desc">
                        Reunión general para alabar juntos, compartir la Palabra y disfrutar en comunidad.
                    </p>
                    <div class="service-meta">
                        <span class="service-time">Domingos • 10:00 AM</span>
                        <span class="service-location">Templo Principal</span>
                    </div>
                </article>

                {{-- Tarjeta 2 --}}
                <article class="service-card">
                    <div class="service-badge">Semanal</div>
                    <h3 class="service-name">Reunión de Oración</h3>
                    <p class="service-desc">
                        Espacio dedicado a la intercesión, oración por las familias y búsqueda espiritual.
                    </p>
                    <div class="service-meta">
                        <span class="service-time">Jueves • 07:00 PM</span>
                        <span class="service-location">Salón Comunitario</span>
                    </div>
                </article>
            </div>
        </section>

        {{-- Call to Action / Contacto --}}
        <section class="cta-section">
            <div class="cta-glow"></div>
            <h2 class="cta-title">¿Quieres saber más?</h2>
            <p class="cta-desc">
                Visítanos cualquier domingo o escríbenos. Estamos aquí para servirte.
            </p>
            <div class="cta-action">
                <a href="https://wa.me/573506213984?text=Hola pastor,%20quisiera%20recibir%20más%20información"
                    class="btn-cta" target="_blank" rel="noopener noreferrer">
                    Contactar Pastor
                </a>
            </div>
        </section>

    </main>
@endsection
