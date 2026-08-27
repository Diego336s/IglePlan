document.addEventListener('DOMContentLoaded', () => {
    // 1. Tooltips Bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // 2. Modals Bootstrap
    const viewMinistryModal = new bootstrap.Modal(document.getElementById('viewMinistryModal'));
    const editMinistryModal = new bootstrap.Modal(document.getElementById('editMinistryModal'));
    const deleteMinistryModal = new bootstrap.Modal(document.getElementById('deleteMinistryModal'));

    // 3. Search and Filters Logic
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const btnClearFilters = document.getElementById('btnClearFilters');
    const btnResetSearch = document.getElementById('btnResetSearch');
    const tableRows = document.querySelectorAll('#ministriesTableBody tr');
    const tableContainer = document.getElementById('tableContainer');
    const emptyState = document.getElementById('emptyState');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedStatus = statusFilter.value;
        let visibleCount = 0;

        tableRows.forEach(row => {
            const name = row.dataset.name.toLowerCase();
     
            const description = row.dataset.description.toLowerCase();
            const status = row.dataset.status;

            const matchesSearch = name.includes(searchTerm)  || description.includes(searchTerm);
            const matchesStatus = selectedStatus === '' || status === selectedStatus;

            if (matchesSearch && matchesStatus) {
                row.classList.remove('d-none');
                visibleCount++;
            } else {
                row.classList.add('d-none');
            }
        });

        if (visibleCount === 0) {
            tableContainer.classList.add('d-none');
            emptyState.classList.remove('d-none');
        } else {
            tableContainer.classList.remove('d-none');
            emptyState.classList.add('d-none');
        }
    }

    searchInput.addEventListener('input', filterTable);
    statusFilter.addEventListener('change', filterTable);

    function resetFilters() {
        searchInput.value = '';
        statusFilter.value = '';
        filterTable();
    }

    btnClearFilters.addEventListener('click', resetFilters);
    if (btnResetSearch) {
        btnResetSearch.addEventListener('click', resetFilters);
    }

    // 4. Action Delegation
    document.getElementById('ministriesTableBody').addEventListener('click', (e) => {
        const btnView = e.target.closest('.btn-view');
        const btnEdit = e.target.closest('.btn-edit');
        const btnDelete = e.target.closest('.btn-delete');
        const row = e.target.closest('tr');

        if (!row) return;

        const data = row.dataset;

        // VER DETALLE
        if (btnView) {
            document.getElementById('viewMinistryName').textContent = data.name;
            
            document.getElementById('viewMinistryDescription').textContent = data.description || 'Sin descripción detallada.';
            document.getElementById('viewMinistryStatusBadge').innerHTML = getStatusBadgeHtml(data.status);

            viewMinistryModal.show();
        }

        // EDITAR
        if (btnEdit) {
            document.getElementById('editMinistryId').value = data.ministryId;
            document.getElementById('editMinistryName').value = data.name;
            document.getElementById('editMinistryStatus').value = data.status;
            document.getElementById('editMinistryDescription').value = data.description;

            editMinistryModal.show();
        }

        // ELIMINAR
        if (btnDelete) {
            document.getElementById('deleteMinistryId').value = data.ministryId;
            deleteMinistryModal.show();
        }
    });

    // 5. Submit Form Editar
    document.getElementById('editMinistryForm').addEventListener('submit', (e) => {
        e.preventDefault();
        editMinistryModal.hide();
    });

    // 6. Confirmar Eliminación
    document.getElementById('btnConfirmDelete').addEventListener('click', () => {
        const id = document.getElementById('deleteMinistryId').value;
        const rowToDelete = document.querySelector(`tr[data-ministry-id="${id}"]`);
        if (rowToDelete) {
            rowToDelete.remove();
            filterTable();
        }
        deleteMinistryModal.hide();
    });

    function getStatusBadgeHtml(status) {
        if (status === 'Activo') {
            return `<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-medium">Activo</span>`;
        }
        return `<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3 py-2 rounded-pill fw-medium">Inactivo</span>`;
    }
});