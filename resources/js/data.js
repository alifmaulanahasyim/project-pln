let isStatusSorted = false;
let isDivisiSorted = false;
let originalTbodyHTML = '';

function confirmDelete(button) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        button.parentElement.submit();
    }
}

function updateDivisiCounts() {
    const rows = Array.from(document.querySelectorAll("#mahasiswaTable tbody tr"));
    const counts = {
        ENGINEERING: 0,
        OPERASI: 0,
        PEMELIHARAAN: 0,
        'BUSINESS SUPPORT': 0
    };

    rows.forEach(row => {
        const divisi = row.querySelector("td:nth-child(7)")?.textContent.trim().toUpperCase();
        const jumlah = parseInt(row.querySelector("td:nth-child(8)")?.textContent.trim()) || 0;

        if (counts.hasOwnProperty(divisi)) {
            counts[divisi] += jumlah;
        }
    });

    const container = document.getElementById("divisi-counts");
    container.innerHTML = Object.entries(counts)
        .map(([div, count]) => `
            <div class="badge bg-dark text-white p-3 fs-6 rounded-pill shadow">
                ${div}: <strong>${count}</strong> orang
            </div>
        `).join('');
}

function updateStatusCountsByDivision() {
    const rows = Array.from(document.querySelectorAll("#mahasiswaTable tbody tr"));
    const divisions = ['ENGINEERING', 'OPERASI', 'PEMELIHARAAN', 'BUSINESS SUPPORT'];
    const statuses = ['Pending', 'Ditolak', 'Diterima'];

    const counts = {};

    divisions.forEach(div => {
        counts[div] = { Pending: 0, Ditolak: 0, Diterima: 0 };
    });

    rows.forEach(row => {
        const divisi = row.querySelector("td:nth-child(7)")?.textContent.trim().toUpperCase();
        const status = row.querySelector("td:nth-child(9) .status-badge")?.textContent.trim();
        const jumlah = parseInt(row.querySelector("td:nth-child(8)")?.textContent.trim()) || 0;

        if (counts[divisi] && statuses.includes(status)) {
            counts[divisi][status] += jumlah;
        }
    });

    const container = document.getElementById("status-counts");
    container.innerHTML = Object.entries(counts).map(([div, statusData]) => `
        <div class="mb-3">
            <h6 class="text-uppercase fw-bold">${div}</h6>
            <div class="d-flex flex-wrap gap-2">
                ${statuses.map(status => `
                    <div class="badge bg-secondary text-white p-2 rounded-pill shadow">
                        ${status}: <strong>${statusData[status]}</strong>
                    </div>
                `).join('')}
            </div>
        </div>
    `).join('');
}

function sortTable(order) {
    const table = document.getElementById("mahasiswaTable");
    const tbody = table.querySelector("tbody");

    if (!originalTbodyHTML) {
        originalTbodyHTML = tbody.innerHTML;
    }

    if (order === 'status') {
        const rows = Array.from(tbody.querySelectorAll("tr"));
        const statusOrder = ['Pending', 'Ditolak', 'Diterima'];

        if (!isStatusSorted) {
            rows.sort((a, b) => {
                const statusA = a.querySelector("td:nth-child(9) .status-badge")?.textContent.trim() || '';
                const statusB = b.querySelector("td:nth-child(9) .status-badge")?.textContent.trim() || '';
                return statusOrder.indexOf(statusA) - statusOrder.indexOf(statusB);
            });
            isStatusSorted = true;
        } else {
            tbody.innerHTML = originalTbodyHTML;
            isStatusSorted = false;
            updateDivisiCounts();
            updateStatusCountsByDivision();
            return;
        }

        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
        updateDivisiCounts();
        updateStatusCountsByDivision();
        return;
    }

    if (order === 'divisi') {
        const rows = Array.from(tbody.querySelectorAll("tr"));
        const divisiOrder = ['ENGINEERING', 'OPERASI', 'PEMELIHARAAN', 'BUSINESS SUPPORT'];

        if (!isDivisiSorted) {
            rows.sort((a, b) => {
                const divA = a.querySelector("td:nth-child(7)")?.textContent.trim().toUpperCase() || '';
                const divB = b.querySelector("td:nth-child(7)")?.textContent.trim().toUpperCase() || '';
                return divisiOrder.indexOf(divA) - divisiOrder.indexOf(divB);
            });
            isDivisiSorted = true;
        } else {
            tbody.innerHTML = originalTbodyHTML;
            isDivisiSorted = false;
            updateDivisiCounts();
            updateStatusCountsByDivision();
            return;
        }

        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
        updateDivisiCounts();
        updateStatusCountsByDivision();
        return;
    }

    // Sort by date (newest or oldest)
    const rows = Array.from(tbody.querySelectorAll("tr"));
    rows.sort((a, b) => {
        const dateA = new Date(a.getAttribute("data-date"));
        const dateB = new Date(b.getAttribute("data-date"));
        return order === 'newest' ? dateB - dateA : dateA - dateB;
    });

    tbody.innerHTML = '';
    rows.forEach(row => tbody.appendChild(row));
    isStatusSorted = false;
    isDivisiSorted = false;
    updateDivisiCounts();
    updateStatusCountsByDivision();
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".btn.btn-success").addEventListener("click", () => sortTable('divisi'));
    document.querySelector(".btn.btn-primary").addEventListener("click", () => sortTable('newest'));
    document.querySelector(".btn.btn-secondary").addEventListener("click", () => sortTable('oldest'));
    document.querySelector(".btn.btn-info").addEventListener("click", () => sortTable('status'));

    updateDivisiCounts();
    updateStatusCountsByDivision();
});
