/**
 * IGLEPLAN - Responsive Dashboard Client Logic
 */

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

    // User Table Search Filter
    const searchInput = document.getElementById('userSearchInput');
    const table = document.getElementById('usersTable');

    if (searchInput && table) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    }
});