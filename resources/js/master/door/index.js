"use strict";

import { initFormHandler } from "../../utils/form-handler";
import { initTabulator } from "../../utils/tabulator";

const tableId = "door-table";
const dataUrl = "/master/door/data";

const formId = "#form-create";
const formRules = {
    name: [{ rule: "required", errorMessage: "Name is required" }],
    ip_address: [{ rule: "required", errorMessage: "IP Address is required" }],
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

const selectCamera = () => {
    new TomSelect("#select-camera", {
        valueField: "id",
        labelField: "label",
        searchField: ["label"],
        preload: true,
        create: false,
        sortField: { field: "label", direction: "asc" },
        load: function (query, callback) {
            $.ajax({
                url: "/select/camera",
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
    selectCamera();

    initTabulator(tableId, dataUrl, [
        { title: "Name", field: "name" },
        { title: "IP Address", field: "ip_address" },
        { title: "Username", field: "username" },
        { title: "Password", field: "password" },
        { title: "Auto Lock", field: "auto lock" },
    ]);

    initFormHandler(formId, formRules, tableId, dataUrl);
});
