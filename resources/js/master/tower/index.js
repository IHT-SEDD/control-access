"use strict";

import { initFormHandler } from "../../utils/form-handler";
import { initTabulator } from "../../utils/tabulator";

const tableId = "tower-table";
const dataUrl = "/master/tower/data";

const formId = "#form-create";
const formRules = {
    name: [{ rule: "required", errorMessage: "Name is required" }],
};

document.addEventListener("DOMContentLoaded", () => {
    initTabulator(tableId, dataUrl, [
        { title: "Name", field: "name" },
        { title: "Description", field: "description" },
    ]);

    initFormHandler(formId, formRules, tableId, dataUrl);
});
