document.addEventListener('DOMContentLoaded', () => {
    // Search Elements
    const searchInput = document.getElementById('eventsSearchInput');
    const clearSearchBtn = document.getElementById('clearEventsSearchBtn');
    const eventCards = document.querySelectorAll('.event-card');
    const weekSections = document.querySelectorAll('.week-section');
    const emptyState = document.getElementById('eventsEmptyState');

    // Bootstrap Modal Instance using CDN Object
    const modalElement = document.getElementById('eventDetailModal');
    let bsModal = null;
    
    if (modalElement && typeof bootstrap !== 'undefined') {
        bsModal = new bootstrap.Modal(modalElement);
    }

    // Modal Field References
    const modalTitle = document.getElementById('modalTitle');
    const modalCategory = document.getElementById('modalCategory');
    const modalStatus = document.getElementById('modalStatus');
    const modalDate = document.getElementById('modalDate');
    const modalDuration = document.getElementById('modalDuration');
    const modalLocation = document.getElementById('modalLocation');
    const modalMinistry = document.getElementById('modalMinistry');
    const modalOrganizer = document.getElementById('modalOrganizer');
    const modalContact = document.getElementById('modalContact');
    const modalAttendance = document.getElementById('modalAttendance');
    const modalDescription = document.getElementById('modalDescription');
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
            const cards = section.querySelectorAll('.event-card');
            let visibleCardsInWeek = 0;

            cards.forEach(card => {
                const parentCol = card.parentElement;
                const searchableText = [
                    card.dataset.title,
                    card.dataset.category,
                    card.dataset.ministry,
                    card.dataset.organizer,
                    card.dataset.location,
                    card.dataset.date,
                    card.dataset.description
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
        modalCategory.textContent = card.dataset.category || '';
        modalStatus.textContent = card.dataset.status || '';
        modalDate.textContent = `${card.dataset.date} (${card.dataset.time})`;
        modalDuration.textContent = card.dataset.duration || 'N/A';
        modalLocation.textContent = card.dataset.location || 'N/A';
        modalMinistry.textContent = card.dataset.ministry || 'N/A';
        modalOrganizer.textContent = card.dataset.organizer ? `Organiza: ${card.dataset.organizer}` : '';
        modalContact.textContent = card.dataset.contact || 'N/A';
        modalAttendance.textContent = card.dataset.attendance || 'N/A';
        modalDescription.textContent = card.dataset.description || '';
        modalNotes.textContent = card.dataset.notes || 'Sin notas adicionales.';
        modalCover.src = card.dataset.cover || 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=800&q=80';

        bsModal.show();
    };

    // Attach Click and Keyboard Listeners to Event Cards
    eventCards.forEach(card => {
        card.addEventListener('click', () => openModal(card));
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openModal(card);
            }
        });
    });
});