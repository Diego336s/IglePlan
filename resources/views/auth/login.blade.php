@extends('layouts.app')
@section('contenido')
    <title>Login - IGLEICO</title>
    @push('styles')
        @vite(['resources/css/auth/login.css'])
    @endpush




    <main class="min-vh-100 d-flex flex-column flex-lg-row">

        {{-- Left Side: Branding Banner (40% Desktop) --}}
        <section
            class="branding-section col-lg-5 col-xl-4 d-none d-lg-flex flex-column justify-content-between p-5 position-relative overflow-hidden">
            {{-- Background Geometric Patterns --}}
            <div class="brand-bg-circle circle-1"></div>
            <div class="brand-bg-circle circle-2"></div>
            <div class="brand-bg-grid"></div>

            {{-- Top Brand Header --}}
            <div class="position-relative z-1">
                <div
                    class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill bg-white-10 border border-white-20 backdrop-blur">
                    <i class="bi bi-cross text-amber-400 fs-5"></i>
                    <span class="fw-bold tracking-tight text-white fs-6">IGLEPLAN</span>
                </div>
            </div>

            {{-- Middle Slogan Section --}}
            <div class="position-relative z-1 space-y-4 my-auto py-5">
                <h1 class="display-6 fw-bold text-white tracking-tight leading-tight">
                    Plataforma Integral de Gestión Eclesiástica
                </h1>
                <p class="fs-6 text-blue-100 leading-relaxed max-w-sm">
                    Gestiona tu iglesia de forma moderna, organizada y eficiente.
                </p>

                {{-- Feature Micro-Pills --}}
                <div class="pt-2 d-flex flex-wrap gap-2">
                    <span class="badge bg-white-10 text-white border border-white-20 rounded-pill px-3 py-2 fw-medium fs-8">
                        <i class="bi bi-shield-check me-1.5 text-amber-400"></i> Plataforma Segura
                    </span>
                    <span class="badge bg-white-10 text-white border border-white-20 rounded-pill px-3 py-2 fw-medium fs-8">
                        <i class="bi bi-speedometer2 me-1.5 text-amber-400"></i> Panel Intuitivo
                    </span>
                </div>
            </div>

            {{-- Bottom Footer Note --}}
            <div class="position-relative z-1">
                <p class="fs-8 text-blue-200 mb-0">
                    &copy; {{ date('Y') }} IGLEPLAN SaaS. Todos los derechos reservados.
                </p>
            </div>
        </section>

        {{-- Right Side: Centered Login Panel (60% Desktop) --}}
        <section class="login-section col-12 col-lg-7 col-xl-8 d-flex align-items-center justify-content-center p-4 p-md-5">
            <div class="login-card-wrapper w-100 max-w-md space-y-4">

                {{-- Mobile / Tablet Brand Header --}}
                <div class="text-center d-lg-none mb-4">
                    <div class="d-inline-flex align-items-center gap-2 mb-2">
                        <div
                            class="brand-icon-square bg-primary text-white rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-house-heart"></i>
                        </div>
                        <span class="h4 fw-bold text-slate-900 mb-0 tracking-tight">IGLEPLAN</span>
                    </div>
                    <p class="fs-7 text-slate-500 mb-0">Gestiona tu iglesia de forma moderna, organizada y eficiente.</p>
                </div>

                {{-- Main Login Card --}}
                <div class="card border-0 shadow-soft rounded-4 bg-white p-4 p-sm-5">

                    {{-- Card Header --}}
                    <div class="mb-4">
                        <h2 class="h3 fw-bold text-slate-900 mb-1 tracking-tight">Bienvenido</h2>
                        <p class="fs-7 text-slate-500 mb-0">Inicia sesión para acceder a IGLEPLAN.</p>
                    </div>

                    {{-- General Error Alert (Hidden by Default) --}}
                    <div id="loginAlert"
                        class="alert alert-danger border-0 bg-danger-subtle text-danger-emphasis rounded-3 p-3 fs-7 d-none align-items-start gap-2 mb-4"
                        role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-6 flex-shrink-0 mt-0.5"></i>
                        <div id="loginAlertText">Las credenciales ingresadas son incorrectas. Por favor, verifica e intenta
                            de nuevo.</div>
                    </div>

                    {{-- Authentication Form --}}
                    <form action="{{ route('login') }}" method="POST" id="loginForm" novalidate>
                        @csrf

                        {{-- Email Input --}}
                        <div class="mb-3.5">
                            <label for="email" class="form-label fs-7 fw-semibold text-slate-700 mb-1.5">
                                Correo Electrónico
                            </label>
                            <div class="position-relative">
                                <i
                                    class="bi bi-envelope input-icon position-absolute start-0 top-50 translate-middle-y ms-3 text-slate-400"></i>
                                <input type="email"
                                    class="form-control form-control-lg fs-7 ps-5 pe-3 text-slate-900 border-slate-200 rounded-3"
                                    id="email" name="email" placeholder="ejemplo@iglesia.org" required
                                    autocomplete="email">
                                <div class="invalid-feedback fs-8 mt-1">
                                    Ingresa un correo electrónico válido.
                                </div>
                            </div>
                        </div>

                        {{-- Password Input --}}
                        <div class="mb-3.5">
                            <label for="password" class="form-label fs-7 fw-semibold text-slate-700 mb-1.5">
                                Contraseña
                            </label>
                            <div class="position-relative">
                                <i
                                    class="bi bi-lock input-icon position-absolute start-0 top-50 translate-middle-y ms-3 text-slate-400"></i>
                                <input type="password"
                                    class="form-control form-control-lg fs-7 ps-5 pe-5 text-slate-900 border-slate-200 rounded-3"
                                    id="password" name="password" placeholder="••••••••" required minlength="6"
                                    autocomplete="current-password">
                                <button type="button" id="togglePasswordBtn"
                                    class="btn btn-link text-decoration-none text-slate-400 hover-text-slate-600 position-absolute end-0 top-50 translate-middle-y pe-3 py-0 border-0"
                                    aria-label="Mostrar u ocultar contraseña">
                                    <i class="bi bi-eye fs-6" id="togglePasswordIcon"></i>
                                </button>
                                <div class="invalid-feedback fs-8 mt-1">
                                    Por favor ingresa tu contraseña.
                                </div>
                            </div>
                        </div>

                        {{-- Remember Me Checkbox --}}
                        <div class="form-check mb-4">
                            <input class="form-check-input rounded border-slate-300" type="checkbox" value="1"
                                id="remember" name="remember">
                            <label class="form-check-label fs-7 text-slate-600 select-none ms-1" for="remember">
                                Recordarme en este dispositivo
                            </label>
                        </div>

                        {{-- Primary Submit Button --}}
                        <button type="submit" id="submitBtn"
                            class="btn btn-primary btn-lg w-100 rounded-3 fs-7 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <span id="btnText">Iniciar Sesión</span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <i id="btnIcon" class="bi bi-arrow-right fs-6"></i>
                        </button>
                    </form>

                    {{-- Footer Version Note --}}
                    <div class="mt-4 pt-3 border-top border-slate-100 text-center">
                        <span class="badge bg-slate-100 text-slate-500 rounded-pill px-3 py-1 fs-8 fw-normal">
                            Versión 1.0
                        </span>
                    </div>

                </div>

            </div>
        </section>

    </main>
@endsection
@push('scripts')
    @vite(['resources/js/auth/login.js'])
@endpush
