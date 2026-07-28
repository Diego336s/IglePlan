document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const btnIcon = document.getElementById('btnIcon');
    const loginAlert = document.getElementById('loginAlert');
    const loginAlertText = document.getElementById('loginAlertText');

    // 1. Password Visibility Toggle
    if (togglePasswordBtn && passwordInput && togglePasswordIcon) {
        togglePasswordBtn.addEventListener('click', () => {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

            togglePasswordIcon.classList.toggle('bi-eye', !isPassword);
            togglePasswordIcon.classList.toggle('bi-eye-slash', isPassword);
        });
    }

    // 2. Form Submission & Client Validation
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Clear previous alert state
            if (loginAlert) {
                loginAlert.classList.add('d-none');
                loginAlert.classList.remove('d-flex');
            }

            // Trigger Bootstrap browser native validation styles
            if (!loginForm.checkValidity()) {
                e.stopPropagation();
                loginForm.classList.add('was-validated');
                return;
            }

            loginForm.classList.add('was-validated');

            // Set Loading UI State
            setLoadingState(true);

            // Simulation of async auth dispatch
            setTimeout(() => {
                const emailVal = document.getElementById('email').value.trim();

                // Example mock check for demo error feedback
                if (emailVal === 'error@iglesia.org') {
                    setLoadingState(false);
                    showErrorAlert('Las credenciales proporcionadas no corresponden a ninguna cuenta activa.');
                } else {
                    // Successful flow: Submit actual HTML form to Laravel backend controller
                    loginForm.submit();
                }
            }, 1200);
        });
    }

    // Helper: Toggle Button Loading Animation
    function setLoadingState(isLoading) {
        if (!submitBtn) return;

        if (isLoading) {
            submitBtn.disabled = true;
            btnText.textContent = 'Verificando...';
            btnSpinner.classList.remove('d-none');
            btnIcon.classList.add('d-none');
        } else {
            submitBtn.disabled = false;
            btnText.textContent = 'Iniciar Sesión';
            btnSpinner.classList.add('d-none');
            btnIcon.classList.remove('d-none');
        }
    }

    // Helper: Display Elegant Error Alert
    function showErrorAlert(message) {
        if (loginAlert && loginAlertText) {
            loginAlertText.textContent = message;
            loginAlert.classList.remove('d-none');
            loginAlert.classList.add('d-flex');
        }
    }
});