/**
 * IGLEPLAN - Register Ministry Module Interactions
 * Standard Vanilla JS Implementation
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // References
    const form = document.getElementById('registerUserForm');
    const btnReset = document.getElementById('btnResetForm');
    const btnSubmit = document.getElementById('btnSubmitForm');
    const ministerioInput = document.getElementById('ministerio');
    const descripcionInput = document.getElementById('descripcion');

    /**
     * 1. Form Reset Action
     */
    if (btnReset && form) {
        btnReset.addEventListener('click', () => {
            form.reset();
            form.classList.remove('was-validated');

            // Focus on first input after clearing
            if (ministerioInput) {
                ministerioInput.focus();
            }
        });
    }

    /**
     * 2. Form Submit Handling (Bootstrap 5 Validation + Loading State)
     */
    if (form) {
        form.addEventListener('submit', (e) => {
            // Check native HTML5 / Bootstrap 5 validity
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                
                form.classList.add('was-validated');

                // Find first invalid field and focus it
                const firstInvalid = form.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.focus();
                }
                return;
            }

            // Client-side validation passed -> Show Loading State
            setLoadingState(true);
        });
    }

    /**
     * Helper: Toggle Loading State on Submit Button
     */
    const setLoadingState = (isLoading) => {
        if (!btnSubmit) return;

        const textSpan = btnSubmit.querySelector('.btn-text');
        const spinnerSpan = btnSubmit.querySelector('.btn-spinner');

        if (isLoading) {
            btnSubmit.disabled = true;
            if (btnReset) btnReset.disabled = true;
            
            if (textSpan) textSpan.classList.add('d-none');
            if (spinnerSpan) {
                spinnerSpan.classList.remove('d-none');
                spinnerSpan.classList.add('d-inline-flex');
            }
        } else {
            btnSubmit.disabled = false;
            if (btnReset) btnReset.disabled = false;

            if (textSpan) textSpan.classList.remove('d-none');
            if (spinnerSpan) {
                spinnerSpan.classList.add('d-none');
                spinnerSpan.classList.remove('d-inline-flex');
            }
        }
    };
});