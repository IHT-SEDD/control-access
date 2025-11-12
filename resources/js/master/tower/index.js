"use strict";

import { initTabulator } from "../../utils/tabulator";
import { initFormHandler } from "../global";

document.addEventListener("DOMContentLoaded", () => {
    const tableId = "tower-table";
    const dataUrl = "/master/tower/data";

    initTabulator(tableId, dataUrl, [
        { title: "Name", field: "name" },
        { title: "Description", field: "description" },
    ]);

    const formId = "#form-create";
    const formRules = {
        name: [{ rule: "required", errorMessage: "Name is required" }],
    };

    console.log("Init form handler...");
    initFormHandler(formId, formRules, tableId, dataUrl);
});

