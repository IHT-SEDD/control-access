"use strict";

// Global registry for all tables
window.tables = window.tables || {};

export function initTabulator(tableId, dataUrl, tableColumns = []) {
    const el = document.getElementById(tableId);
    if (!el) return console.warn(`⚠️ Table not found: ${tableId}`);

    fetch(dataUrl, {
        headers: {
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        }
    })
        .then(res => {
            if (!res.ok) throw new Error(`Failed to fetch data: ${res.status}`);
            return res.json();
        })
        .then(data => {
            const tableData = Array.isArray(data) ? data : data.data || [];

            const table = new window.Tabulator(el, {
                data: tableData,
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 50,
                movableColumns: true,
                responsiveLayout: "hide",
                placeholder: "No data available",
                columns: tableColumns,
                columnDefaults: { resizable: true },
                rowHeader: {
                    formatter: "rownum",
                    headerSort: false,
                    hozAlign: "center",
                    frozen: true,
                    title: "No.",
                },
            });

            // Simpan instance
            el.tabulator = table;
            window.tables[tableId] = table;

            console.log(`✅ Tabulator initialized for #${tableId}`);
        })
        .catch(err => console.error("❌ Tabulator init error:", err));
}

export function refreshTabulator(tableId, dataUrl) {
    const table = window.tables[tableId];
    if (table) {
        table.replaceData(dataUrl);
        console.log(`🔄 Refreshed table #${tableId}`);
    } else {
        console.warn(`⚠️ No Tabulator instance found for ${tableId}`);
    }
}
