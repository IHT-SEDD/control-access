"use strict";
import { refreshTabulator } from "./tabulator";

export async function handleFormSubmit(
    form,
    validation,
    tableId = null,
    dataUrl = null
) {
    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: form.method || "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "application/json",
            },
        });

        const data = await response.json();

        if (response.ok && data.success) {
            if (tableId && typeof refreshTabulator === "function") {
                refreshTabulator(tableId, dataUrl);
            }

            form.reset();

            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                alert(data.message || "Data berhasil disimpan!");
            }
        } else if (data.errors) {
            validation.showBackendErrors(data.errors);
        } else {
            alert(
                data.message || "Terjadi kesalahan, silakan periksa input Anda."
            );
        }
    } catch (err) {
        console.error("AJAX Error:", err);
        alert("Terjadi kesalahan koneksi ke server.");
    }
}
