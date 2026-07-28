
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // Clock Logic
    const timeElem = document.getElementById('headerTime');
    if (timeElem) {
        setInterval(() => {
            const now = new Date();
            timeElem.textContent = now.toLocaleTimeString('es-CO', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }, 1000);
    }
});