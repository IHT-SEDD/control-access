"use strict";

import { initFormValidation } from "./form-validation";
import { handleFormSubmit } from "./global";

export function initFormHandler(
    formId,
    formRules,
    tableId = null,
    dataUrl = null
) {
    initFormValidation(formId, formRules, (event, form, validation) => {
        handleFormSubmit(form, validation, tableId, dataUrl);
    });
}
