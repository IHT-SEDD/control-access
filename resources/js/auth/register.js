import { initFormValidation } from "../utils/form-validation";

const registerRules = {
    name: [
        { rule: "required", errorMessage: "Name is required" },
        { rule: "minLength", value: 2, errorMessage: "Minimum 2 characters" },
    ],
    email: [
        { rule: "required", errorMessage: "Email is required" },
        { rule: "email", errorMessage: "Invalid email format" },
    ],
    password: [
        { rule: "required", errorMessage: "Password is required" },
        { rule: "minLength", value: 8, errorMessage: "Minimum 8 characters" },
    ],
    password_confirmation: [
        { rule: "required", errorMessage: "Password confirmation is required" },
        { rule: "minLength", value: 8, errorMessage: "Minimum 8 characters" },
    ],
};

initFormValidation(
    "#registerForm",
    registerRules,
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
