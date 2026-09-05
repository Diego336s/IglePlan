@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin/users/form.css'])
@endpush

@section('contenido')
    <div class="register-container py-4">
        <!-- Page Header -->
        <header class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">

                    <h1 class="page-title h3 mb-1">Registrar Usuario</h1>
                    <p class="page-description mb-0">
                        Registra nuevos usuarios dentro de la plataforma IGLEPLAN.
                    </p>
                </div>
            </div>
        </header>

        <!-- Feedback Alerts -->
        <div id="alertContainer" class="mb-4">
            {{-- Backend / Server validation feedback --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center rounded-3 shadow-sm"
                    role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <strong>Por favor corrige los siguientes errores:</strong>
                    </div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif
        </div>

        <!-- Main Form Card -->
        <div class="card form-card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ $ruta }}" method="{{ $method }}" id="registerUserForm"
                    class="needs-validation" novalidate>
                    @csrf

                    <div class="row g-4">
                        <!-- First Name -->
                        <div class="col-12 col-md-6">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-person input-icon"></i>
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Nombre" value="{{ old('name') }}"
                                        required autocomplete="given-name">
                                    <label for="name">Nombre <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Por favor ingresa el nombre.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-12 col-md-6">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-person input-icon"></i>
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control rounded-3 @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name" placeholder="Apellido"
                                        value="{{ old('last_name') }}" required autocomplete="family-name">
                                    <label for="last_name">Apellido <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Por favor ingresa el apellido.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="col-12 col-md-6">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-envelope input-icon"></i>
                                <div class="form-floating">
                                    <input type="email"
                                        class="form-control rounded-3 @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}" required
                                        autocomplete="email">
                                    <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Ingresa un correo electrónico válido.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-12 col-md-6">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-telephone input-icon"></i>
                                <div class="form-floating">
                                    <input type="tel"
                                        class="form-control rounded-3 @error('telefono') is-invalid @enderror"
                                        id="telefono" name="telefono" placeholder="+57 300 123 4567"
                                        value="{{ old('telefono') }}" autocomplete="tel">
                                    <label for="phone">Número de Teléfono</label>
                                    <div class="invalid-feedback">
                                        Por favor ingresa un número telefónico válido.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Role Selection -->
                        <div class="col-12">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <div class="form-floating">
                                    <select class="form-select rounded-3 @error('role') is-invalid @enderror" id="rol_id"
                                        name="rol_id" required>
                                        <option value="" selected disabled>Selecciona un rol...</option>
                                        @foreach ($rols as $rol)
                                            <option value="{{ $rol->id }}"
                                                {{ old('rol_id') == $rol->id ? 'selected' : '' }}>
                                                {{ $rol->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="role">Rol en la Plataforma <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Selecciona un rol para el usuario.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="col-12 col-md-6">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-lock input-icon"></i>
                                <div class="form-floating">
                                    <input type="password"
                                        class="form-control rounded-3 pe-5 @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Contraseña" required
                                        autocomplete="new-password">
                                    <label for="password">Contraseña <span class="text-danger">*</span></label>
                                    <button type="button"
                                        class="btn toggle-password-btn position-absolute end-0 top-50 translate-middle-y me-2 text-muted"
                                        data-target="password" aria-label="Mostrar u ocultar contraseña" tabindex="-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <div class="invalid-feedback">
                                        La contraseña no cumple con los requisitos mínimos.
                                    </div>
                                </div>
                            </div>

                            <!-- Password Strength Bar -->
                            <div class="password-strength-container mt-2">
                                <div class="progress rounded-pill progress-sm">
                                    <div id="passwordStrengthMeter" class="progress-bar bg-danger" role="progressbar"
                                        style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small id="passwordStrengthText" class="form-text text-muted d-block mt-1">Fortaleza de
                                    contraseña: <span class="fw-semibold text-secondary">Sin ingresar</span></small>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="col-12 col-md-6">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-shield-check input-icon"></i>
                                <div class="form-floating">
                                    <input type="password" class="form-control rounded-3 pe-5" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirmar Contraseña" required
                                        autocomplete="new-password">
                                    <label for="password_confirmation">Confirmar Contraseña <span
                                            class="text-danger">*</span></label>
                                    <button type="button"
                                        class="btn toggle-password-btn position-absolute end-0 top-50 translate-middle-y me-2 text-muted"
                                        data-target="password_confirmation"
                                        aria-label="Mostrar u ocultar confirmación de contraseña" tabindex="-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <div class="invalid-feedback" id="confirmPasswordFeedback">
                                        Las contraseñas no coinciden.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Requirements Checklist Card -->
                        <div class="col-12">
                            <div class="requirements-card card border-0 bg-light-subtle rounded-3 p-3">
                                <h6 class="card-subtitle mb-2 text-dark font-monospace small fw-bold">Requisitos de la
                                    contraseña:</h6>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2">
                                    <div class="col requirement-item text-muted" id="reqMinLength">
                                        <i class="bi bi-x-circle me-1 text-danger"></i>
                                        <span>Al menos 8 caracteres</span>
                                    </div>
                                    <div class="col requirement-item text-muted" id="reqUppercase">
                                        <i class="bi bi-x-circle me-1 text-danger"></i>
                                        <span>Una letra mayúscula</span>
                                    </div>
                                    <div class="col requirement-item text-muted" id="reqLowercase">
                                        <i class="bi bi-x-circle me-1 text-danger"></i>
                                        <span>Una letra minúscula</span>
                                    </div>
                                    <div class="col requirement-item text-muted" id="reqNumber">
                                        <i class="bi bi-x-circle me-1 text-danger"></i>
                                        <span>Un número</span>
                                    </div>
                                    <div class="col requirement-item text-muted" id="reqSpecial">
                                        <i class="bi bi-x-circle me-1 text-danger"></i>
                                        <span>Un carácter especial (@$!%*?&amp;)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-12 mt-4 pt-2">
                            <div
                                class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-end gap-3">
                                <button type="button" id="btnResetForm"
                                    class="btn btn-outline-secondary px-4 py-2-5 rounded-3 fw-medium order-2 order-sm-1">
                                    <i class="bi bi-eraser me-2"></i>Limpiar Formulario
                                </button>
                                <button type="submit" id="btnSubmitForm"
                                    class="btn btn-primary px-4 py-2-5 rounded-3 fw-medium order-1 order-sm-2 position-relative">
                                    <span class="btn-text d-inline-flex align-items-center">
                                        <i class="bi bi-person-plus-fill me-2"></i>Registrar Usuario
                                    </span>
                                    <span class="btn-spinner d-none align-items-center justify-content-center">
                                        <span class="spinner-border spinner-border-sm me-2" role="status"
                                            aria-hidden="true"></span>
                                        Guardando...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/admin/users/form.js'])
@endpush
