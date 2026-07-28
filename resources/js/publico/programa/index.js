document.addEventListener('DOMContentLoaded', () => {
    // Search Elements
    const searchInput = document.getElementById('scheduleSearchInput');
    const clearSearchBtn = document.getElementById('clearSearchBtn');
    const activityCards = document.querySelectorAll('.activity-card');
    const weekSections = document.querySelectorAll('.week-section');
    const emptyState = document.getElementById('scheduleEmptyState');

    // Bootstrap Modal Instance using Global Object (CDN)
    const modalElement = document.getElementById('activityDetailModal');
    
    // Validar que Bootstrap CDN se haya cargado correctamente en el DOM
    let bsModal = null;
    if (modalElement && typeof bootstrap !== 'undefined') {
        bsModal = new bootstrap.Modal(modalElement);
    }

    const modalTitle = document.getElementById('modalTitle');
    const modalType = document.getElementById('modalType');
    const modalStatus = document.getElementById('modalStatus');
    const modalDate = document.getElementById('modalDate');
    const modalDuration = document.getElementById('modalDuration');
    const modalLocation = document.getElementById('modalLocation');
    const modalMinistry = document.getElementById('modalMinistry');
    const modalLeader = document.getElementById('modalLeader');
    const modalTheme = document.getElementById('modalTheme');
    const modalDescription = document.getElementById('modalDescription');
    const modalParticipants = document.getElementById('modalParticipants');
    const modalNotes = document.getElementById('modalNotes');
    const modalCover = document.getElementById('modalCover');

    // Filter Logic
    const handleSearch = () => {
        const query = searchInput.value.toLowerCase().trim();
        let totalVisibleCards = 0;

        if (query.length > 0) {
            clearSearchBtn.classList.remove('d-none');
        } else {
            clearSearchBtn.classList.add('d-none');
        }

        weekSections.forEach(section => {
            const cards = section.querySelectorAll('.activity-card');
            let visibleCardsInWeek = 0;

            cards.forEach(card => {
                const parentCol = card.parentElement;
                const searchableText = [
                    card.dataset.title,
                    card.dataset.type,
                    card.dataset.ministry,
                    card.dataset.leader,
                    card.dataset.location,
                    card.dataset.date,
                    card.dataset.theme
                ].join(' ').toLowerCase();

                if (searchableText.includes(query)) {
                    parentCol.classList.remove('d-none');
                    visibleCardsInWeek++;
                    totalVisibleCards++;
                } else {
                    parentCol.classList.add('d-none');
                }
            });

            // Toggle weekly section header visibility based on contents
            if (visibleCardsInWeek === 0) {
                section.classList.add('d-none');
            } else {
                section.classList.remove('d-none');
            }
        });

        // Toggle Empty State View
        if (totalVisibleCards === 0) {
            emptyState.classList.remove('d-none');
        } else {
            emptyState.classList.add('d-none');
        }
    };

    // Attach Search Handlers
    if (searchInput) {
        searchInput.addEventListener('input', handleSearch);
    }

    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', () => {
            searchInput.value = '';
            handleSearch();
            searchInput.focus();
        });
    }

    // Modal Display Logic
    const openModal = (card) => {
        if (!bsModal) return;

        modalTitle.textContent = card.dataset.title || '';
        modalType.textContent = card.dataset.type || '';
        modalStatus.textContent = card.dataset.status || '';
        modalDate.textContent = `${card.dataset.date} (${card.dataset.time})`;
        modalDuration.textContent = card.dataset.duration || 'N/A';
        modalLocation.textContent = card.dataset.location || 'N/A';
        modalMinistry.textContent = card.dataset.ministry || 'N/A';
        modalLeader.textContent = card.dataset.leader || 'N/A';
        modalTheme.textContent = card.dataset.theme ? `Tema: ${card.dataset.theme}` : '';
        modalDescription.textContent = card.dataset.description || '';
        modalParticipants.textContent = card.dataset.participants || 'N/A';
        modalNotes.textContent = card.dataset.notes || 'Sin notas adicionales.';
        modalCover.src = card.dataset.cover || 'https://images.unsplash.com/photo-1438232992991-995b7058bbb3?auto=format&fit=crop&w=800&q=80';

        bsModal.show();
    };

    // Attach Click and Keyboard Listeners to Cards
    activityCards.forEach(card => {
        card.addEventListener('click', () => openModal(card));
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openModal(card);
            }
        });
    });
});