/**
 * IGLEPLAN - Register User Module Interactions
 * Standard Vanilla JS Implementation
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // Element References
    const form = document.getElementById('registerUserForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const toggleButtons = document.querySelectorAll('.toggle-password-btn');
    const btnReset = document.getElementById('btnResetForm');
    const btnSubmit = document.getElementById('btnSubmitForm');

    // Password Strength Elements
    const meter = document.getElementById('passwordStrengthMeter');
    const strengthText = document.getElementById('passwordStrengthText');

    // Requirement Elements
    const reqs = {
        minLength: document.getElementById('reqMinLength'),
        uppercase: document.getElementById('reqUppercase'),
        lowercase: document.getElementById('reqLowercase'),
        number: document.getElementById('reqNumber'),
        special: document.getElementById('reqSpecial'),
    };

    /**
     * 1. Toggle Password Visibility
     */
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            const icon = button.querySelector('i');

            if (targetInput) {
                const isPassword = targetInput.getAttribute('type') === 'password';
                targetInput.setAttribute('type', isPassword ? 'text' : 'password');
                
                // Toggle Icon
                icon.classList.toggle('bi-eye', !isPassword);
                icon.classList.toggle('bi-eye-slash', isPassword);
            }
        });
    });

    /**
     * 2. Password Strength & Requirement Validation
     */
    const validatePasswordRequirements = (password) => {
        const tests = {
            minLength: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[@$!%*?&]/.test(password),
        };

        let passedCount = 0;

        // Update Checklist UI
        Object.keys(tests).forEach(key => {
            const isPassed = tests[key];
            const element = reqs[key];

            if (element) {
                const icon = element.querySelector('i');
                if (isPassed) {
                    element.classList.add('valid');
                    icon.className = 'bi bi-check-circle-fill me-1 text-success';
                    passedCount++;
                } else {
                    element.classList.remove('valid');
                    icon.className = 'bi bi-x-circle me-1 text-danger';
                }
            }
        });

        // Update Strength Meter Bar
        updateStrengthMeter(passedCount, password.length);

        return passedCount === 5;
    };

    const updateStrengthMeter = (score, length) => {
        if (length === 0) {
            meter.style.width = '0%';
            meter.className = 'progress-bar bg-danger';
            strengthText.innerHTML = 'Fortaleza de contraseña: <span class="fw-semibold text-secondary">Sin ingresar</span>';
            return;
        }

        let width = (score / 5) * 100;
        meter.style.width = `${width}%`;

        if (score <= 2) {
            meter.className = 'progress-bar bg-danger';
            strengthText.innerHTML = 'Fortaleza de contraseña: <span class="fw-semibold text-danger">Débil</span>';
        } else if (score === 3 || score === 4) {
            meter.className = 'progress-bar bg-warning';
            strengthText.innerHTML = 'Fortaleza de contraseña: <span class="fw-semibold text-warning">Media</span>';
        } else {
            meter.className = 'progress-bar bg-success';
            strengthText.innerHTML = 'Fortaleza de contraseña: <span class="fw-semibold text-success">Fuerte</span>';
        }
    };

    // Live validation listener for Password
    if (passwordInput) {
        passwordInput.addEventListener('input', (e) => {
            validatePasswordRequirements(e.target.value);
            checkPasswordsMatch();
        });
    }

    /**
     * 3. Confirm Password Live Matching Check
     */
    const checkPasswordsMatch = () => {
        if (!confirmPasswordInput) return true;

        const pwd = passwordInput.value;
        const confirmPwd = confirmPasswordInput.value;

        if (confirmPwd.length > 0 && pwd !== confirmPwd) {
            confirmPasswordInput.setCustomValidity('Las contraseñas no coinciden');
            return false;
        } else {
            confirmPasswordInput.setCustomValidity('');
            return true;
        }
    };

    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', checkPasswordsMatch);
    }

    /**
     * 4. Form Reset Action
     */
    if (btnReset) {
        btnReset.addEventListener('click', () => {
            form.reset();
            form.classList.remove('was-validated');

            // Reset strength meter and rules visual state
            updateStrengthMeter(0, 0);
            Object.values(reqs).forEach(element => {
                if (element) {
                    element.classList.remove('valid');
                    const icon = element.querySelector('i');
                    icon.className = 'bi bi-x-circle me-1 text-danger';
                }
            });

            // Focus on first input
            const firstInput = document.getElementById('first_name');
            if (firstInput) firstInput.focus();
        });
    }

    /**
     * 5. Form Submit Handling (Bootstrap 5 Validation + Loading State)
     */
    if (form) {
        form.addEventListener('submit', (e) => {
            const isMatch = checkPasswordsMatch();
            const isPasswordValid = validatePasswordRequirements(passwordInput.value);

            if (!form.checkValidity() || !isMatch || !isPasswordValid) {
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

    const setLoadingState = (isLoading) => {
        const textSpan = btnSubmit.querySelector('.btn-text');
        const spinnerSpan = btnSubmit.querySelector('.btn-spinner');

        if (isLoading) {
            btnSubmit.disabled = true;
            btnReset.disabled = true;
            textSpan.classList.add('d-none');
            spinnerSpan.classList.remove('d-none');
            spinnerSpan.classList.add('d-inline-flex');
        } else {
            btnSubmit.disabled = false;
            btnReset.disabled = false;
            textSpan.classList.remove('d-none');
            spinnerSpan.classList.add('d-none');
            spinnerSpan.classList.remove('d-inline-flex');
        }
    };
});