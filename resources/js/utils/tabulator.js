export function initTabulator(tableId, dataUrl, tableColumns = []) {
    const el = document.getElementById(tableId);
    if (!el) return console.warn(`Table not found: ${tableId}`);

    fetch(dataUrl)
        .then((res) => {
            if (!res.ok) throw new Error(`Failed to fetch data: ${res.status}`);
            return res.json();
        })
        .then((data) => {
            const tableData = Array.isArray(data) ? data : data.data || [];
            console.log("Fetched data:", tableData);

            const table = new window.Tabulator(el, {
                data: tableData,
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 20,
                paginationSizeSelector: [3, 6, 8, 10],
                movableColumns: true,
                progressiveLoad: "scroll",
                placeholder: "No Data Set",
                responsiveLayout: "hide",
                resizableRows: true,
                columnDefaults: { resizable: true },
                rowHeader: {
                    formatter: "rownum",
                    headerSort: true,
                    hozAlign: "center",
                    frozen: true,
                },
                columns: tableColumns,
            });

            console.log("Tabulator initialized:", table);
        })
        .catch((err) => console.error("Tabulator init error:", err));
}
