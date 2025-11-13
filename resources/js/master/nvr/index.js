"use strict";

import { initFormHandler } from "../../utils/form-handler";
import { initTabulator } from "../../utils/tabulator";

const tableId = "nvr-table";
const dataUrl = "/master/nvr/data";

const formId = "#form-create";
const formRules = {
    tower_id: [{ rule: "required", errorMessage: "Tower is required" }],
    brand: [
        { rule: "required", errorMessage: "Brand is required" },
        {
            rule: "maxLength",
            value: 100,
            errorMessage: "Brand cannot exceed 100 characters",
        },
    ],
    type: [
        {
            rule: "maxLength",
            value: 100,
            errorMessage: "Type cannot exceed 100 characters",
        },
    ],
    name: [
        { rule: "required", errorMessage: "Name is required" },
        {
            rule: "maxLength",
            value: 100,
            errorMessage: "Name cannot exceed 100 characters",
        },
    ],
    initial: [
        {
            rule: "maxLength",
            value: 50,
            errorMessage: "Initial cannot exceed 50 characters",
        },
    ],
    description: [
        {
            rule: "maxLength",
            value: 255,
            errorMessage: "Description cannot exceed 255 characters",
        },
    ],
    ip_address: [{ rule: "required", errorMessage: "IP Address is required" }],
    auth_type: [{ rule: "required", errorMessage: "Auth Type is required" }],
    username: [{ rule: "required", errorMessage: "Username is required" }],
    password: [{ rule: "required", errorMessage: "Password is required" }],
    is_active: [{ rule: "required", errorMessage: "Status is required" }],
};

const selectTower = () => {
    new TomSelect("#select-tower", {
        valueField: "id",
        labelField: "label",
        searchField: ["label"],
        preload: true,
        create: false,
        sortField: { field: "label", direction: "asc" },
        load: function (query, callback) {
            $.ajax({
                url: "/select/tower",
                data: { q: query },
                dataType: "json",
                success: function (res) {
                    const formatted = res.map((item) => ({
                        id: item.id,
                        label: item.venue
                            ? `${item.venue.name} - ${item.text}`
                            : item.text,
                    }));
                    callback(formatted);
                },
                error: function () {
                    callback();
                },
            });
        },
    });
};

document.addEventListener("DOMContentLoaded", () => {
    selectTower();

    initTabulator(tableId, dataUrl, [
        { title: "Name", field: "name" },
        { title: "Brand", field: "brand" },
        { title: "IP Address", field: "ip_address" },
        { title: "Auth Type", field: "auth_type" },
        { title: "Username", field: "username" },
        { title: "Active", field: "is_active", formatter: "tickCross" },
        { title: "Description", field: "description" },
    ]);

    initFormHandler(formId, formRules, tableId, dataUrl);
});
