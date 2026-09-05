@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin/ministerios/form.css'])
@endpush

@section('contenido')
    <div class="register-container py-4">
        <!-- Page Header -->
        <header class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <h1 class="page-title h3 mb-1">Registrar ministerio</h1>
                    <p class="page-description mb-0 text-muted">
                        Registra nuevos ministerios dentro de la plataforma IGLEPLAN.
                    </p>
                </div>
            </div>
        </header>

        <!-- Feedback Alerts -->
        <div id="alertContainer" class="mb-4">
          

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
                        <!-- Nombre del Ministerio -->
                        <div class="col-12">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-diagram-3 input-icon"></i>
                                <div class="form-floating">
                                    <input type="text" 
                                        class="form-control rounded-3 @error('ministerio') is-invalid @enderror"
                                        id="ministerio" 
                                        name="ministerio" 
                                        placeholder="Nombre del ministerio" 
                                        value="{{ old('ministerio') }}"
                                        required 
                                        autocomplete="off">
                                    <label for="ministerio">Nombre del Ministerio <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Por favor ingresa el nombre del ministerio.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Descripción del Ministerio -->
                        <div class="col-12">
                            <div class="input-icon-wrapper">
                                <i class="bi bi-card-text input-icon"></i>
                                <div class="form-floating">
                                    <textarea 
                                        class="form-control rounded-3 @error('descripcion') is-invalid @enderror"
                                        id="descripcion" 
                                        name="descripcion" 
                                        placeholder="Descripción" 
                                        style="height: 120px;" 
                                        required>{{ old('descripcion') }}</textarea>
                                    <label for="descripcion">Descripción del Ministerio <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Por favor ingresa la descripción del ministerio.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-12 mt-4 pt-2">
                            <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-end gap-3">
                                <button type="button" id="btnResetForm"
                                    class="btn btn-outline-secondary px-4 py-2-5 rounded-3 fw-medium order-2 order-sm-1">
                                    <i class="bi bi-eraser me-2"></i>Limpiar Formulario
                                </button>
                                <button type="submit" id="btnSubmitForm"
                                    class="btn btn-primary px-4 py-2-5 rounded-3 fw-medium order-1 order-sm-2 position-relative">
                                    <span class="btn-text d-inline-flex align-items-center">
                                        <i class="bi bi-plus-circle-fill me-2"></i>Registrar Ministerio
                                    </span>
                                    <span class="btn-spinner d-none align-items-center justify-content-center">
                                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
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
    @vite(['resources/js/admin/ministerios/form.js'])
@endpush