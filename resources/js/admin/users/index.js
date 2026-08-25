
document.addEventListener('DOMContentLoaded', () => {
    // 1. Tooltips Initialization
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // 2. Modals Initialization
    const viewUserModalEl = document.getElementById('viewUserModal');
    const editUserModalEl = document.getElementById('editUserModal');
    const deleteUserModalEl = document.getElementById('deleteUserModal');

    const viewUserModal = new bootstrap.Modal(viewUserModalEl);
    const editUserModal = new bootstrap.Modal(editUserModalEl);
    const deleteUserModal = new bootstrap.Modal(deleteUserModalEl);

    // 3. Search and Filters Logic
    const searchInput = document.getElementById('searchInput');
    const roleFilter = document.getElementById('roleFilter');
    const statusFilter = document.getElementById('statusFilter');
    const btnClearFilters = document.getElementById('btnClearFilters');
    const btnResetSearch = document.getElementById('btnResetSearch');
    const tableRows = document.querySelectorAll('#usersTableBody tr');
    const tableContainer = document.getElementById('tableContainer');
    const emptyState = document.getElementById('emptyState');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedRole = roleFilter.value;
        const selectedStatus = statusFilter.value;
        let visibleCount = 0;

        tableRows.forEach(row => {
            const name = (row.dataset.firstName + ' ' + row.dataset.lastName).toLowerCase();
            const email = row.dataset.email.toLowerCase();
            const phone = row.dataset.phone.toLowerCase();
            const role = row.dataset.role;
            const status = row.dataset.status;

            const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm);
            const matchesRole = selectedRole === '' || role === selectedRole;
            const matchesStatus = selectedStatus === '' || status === selectedStatus;

            if (matchesSearch && matchesRole && matchesStatus) {
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
    roleFilter.addEventListener('change', filterTable);
    statusFilter.addEventListener('change', filterTable);

    function resetFilters() {
        searchInput.value = '';
        roleFilter.value = '';
        statusFilter.value = '';
        filterTable();
    }

    btnClearFilters.addEventListener('click', resetFilters);
    if (btnResetSearch) {
        btnResetSearch.addEventListener('click', resetFilters);
    }

    // 4. Action Delegation (View, Edit, Delete)
    document.getElementById('usersTableBody').addEventListener('click', (e) => {
        const btnView = e.target.closest('.btn-view');
        const btnEdit = e.target.closest('.btn-edit');
        const btnDelete = e.target.closest('.btn-delete');
        const row = e.target.closest('tr');

        if (!row) return;

        const data = row.dataset;

        // VER USUARIO
        if (btnView) {
            document.getElementById('viewUserAvatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(data.firstName + ' ' + data.lastName)}&background=2563EB&color=fff&bold=true`;
            document.getElementById('viewUserName').textContent = `${data.firstName} ${data.lastName}`;
            document.getElementById('viewUserEmail').textContent = data.email;
            document.getElementById('viewUserPhone').textContent = data.phone;
            document.getElementById('viewUserRegDate').textContent = data.regDate;


            // Badges
            document.getElementById('viewUserRoleBadge').innerHTML = getRoleBadgeHtml(data.role);
            document.getElementById('viewUserStatusBadge').innerHTML = getStatusBadgeHtml(data.status);

            viewUserModal.show();
        }

        // EDITAR USUARIO
        if (btnEdit) {
            let form = document.getElementById('editUserForm');
            form.action = `user/${data.userId}`;
            document.getElementById('editFirstName').value = data.firstName;
            document.getElementById('editLastName').value = data.lastName;
            document.getElementById('editEmail').value = data.email;
            document.getElementById('editPhone').value = data.phone;
            document.getElementById('editRole').value = data.role;
            document.getElementById('editStatus').value = data.status;

            editUserModal.show();
        }

        // ELIMINAR USUARIO
        if (btnDelete) {

            let form = document.getElementById('formEliminar');
            form.action = `user/${data.userId}`;
            deleteUserModal.show();
        }
    });

    // 5. Submit Form Editar
    document.getElementById('editUserForm').addEventListener('submit', (e) => {

        // Lógica de actualización UI local simulada
        editUserModal.hide();

    });

    // 6. Confirmar Eliminación
    document.getElementById('btnConfirmDelete').addEventListener('click', () => {


    });

    // Helpers
    function getRoleBadgeHtml(role) {
        switch (role) {
            case '1':
                return `<span class="badge bg-purple-subtle text-purple border border-purple-subtle px-3 py-2 rounded-pill fw-medium">Pastor</span>`;
                break;
            case '2':
                return `<span class="badge bg-purple-subtle text-purple border border-purple-subtle px-3 py-2 rounded-pill fw-medium">Lider</span>`;
                break;

            case '3':
                return `<span class="badge bg-purple-subtle text-purple border border-purple-subtle px-3 py-2 rounded-pill fw-medium">Admin</span>`;
                break;


            default:
                return `<span class="badge bg-purple-subtle text-purple border border-purple-subtle px-3 py-2 rounded-pill fw-medium">Rol no identificado</span>`;
                break;
        }

    }

    function getStatusBadgeHtml(status) {
        switch (status) {
            case '1':
                return `<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-medium">Activo</span>`;
                break;
            case '0':
                return `<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-medium">Inactivo</span>`;
                break;

            default:
                return `<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-medium">Estado no identificado</span>`;
                break;
        }

    }
});