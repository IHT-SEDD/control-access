"use strict";
import JustValidate from "just-validate";

export function initFormValidation(
    formId,
    fieldRules,
    onSuccessCallback = null
) {
    const form = document.querySelector(formId);
    if (!form) return console.warn(`Form not found: ${formId}`);

    const validation = new JustValidate(formId, {
        focusInvalidField: true,
        lockForm: true,
        errorFieldCssClass: "border-ruddy",
        errorLabelCssClass: "text-ruddy text-mid-sm font-medium mt-2",
        validateBeforeSubmitting: true,
    });

    Object.keys(fieldRules).forEach((fieldId) => {
        validation.addField(`[name="${fieldId}"]`, fieldRules[fieldId]);

        const inputEl = document.getElementById(fieldId);
        if (!inputEl) return;

        inputEl.addEventListener("input", () =>
            validation.revalidateField(`[name="${fieldId}"]`)
        );
        inputEl.addEventListener("blur", () =>
            validation.revalidateField(`[name="${fieldId}"]`)
        );
    });

    validation.onFail((fields) => {
        const errorFieldIds = Object.keys(fields);
        const inputs = form.querySelectorAll("input, textarea, select");

        inputs.forEach((input) => {
            const id = input.getAttribute("id");
            if (!errorFieldIds.includes(id)) {
                input.value = "";
            }
        });
    });

    validation.onSuccess((event) => {
        event.preventDefault();
        if (typeof onSuccessCallback === "function") {
            onSuccessCallback(event, form, validation);
        }
    });

    validation.showBackendErrors = function (errors) {
        const errorFields = Object.keys(errors);
        const inputs = form.querySelectorAll("input, textarea, select");

        inputs.forEach((input) => {
            const id = input.getAttribute("id");
            if (!errorFields.includes(id)) {
                input.value = "";
            }
        });

        errorFields.forEach((field) => {
            const selector = `#${field}`;
            const inputEl = document.getElementById(field);
            const message = errors[field][0];

            if (inputEl) inputEl.classList.add("border-ruddy");
            validation.showErrors({ [selector]: message });
        });
    };

    form.addEventListener("submit", (e) => e.preventDefault());

    validation.refresh();
}
