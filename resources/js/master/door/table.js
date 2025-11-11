import { initTabulator } from "../../utils/tabulator";

document.addEventListener("DOMContentLoaded", () => {
    initTabulator("door-table", "/master/door/data", [
        { title: "Nama", field: "name", frozen: true },
        { title: "Email", field: "email" },
        { title: "Dibuat", field: "created_at" },
    ]);
});