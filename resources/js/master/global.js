"use strict";

import { refreshTabulator } from "../utils/tabulator";
import { initFormValidation } from "../utils/form-validation";

/**
 * Menangani validasi form, kirim data, reset form, dan refresh tabulator
 */
export function initFormHandler(formId, formRules, tableId = null, dataUrl = null) {
    console.log(formId, formRules);

   initFormValidation(
       formId,
       formRules,
       async (event, form, validation) => {
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
                   if (data.redirect) window.location.href = data.redirect;
               } else if (data.errors) {
                   validation.showBackendErrors(data.errors);
               } else {
                   alert(data.message || "Login failed. Please check your input.");
               }
           } catch (err) {
               console.error("AJAX Error:", err);
           }
       }
       );
}
