document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('mobile-menu-button');
    const closeBtn = document.getElementById('close-mobile-menu');
    const menu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('mobile-overlay');

    const toggleMenu = (isOpen) => {
        if (isOpen) {
            menu.classList.add('open');
            overlay.classList.remove('d-none');
            document.body.style.overflow = 'hidden';
        } else {
            menu.classList.remove('open');
            overlay.classList.add('d-none');
            document.body.style.overflow = '';
        }
    };

    if (openBtn) openBtn.addEventListener('click', () => toggleMenu(true));
    if (closeBtn) closeBtn.addEventListener('click', () => toggleMenu(false));
    if (overlay) overlay.addEventListener('click', () => toggleMenu(false));
});