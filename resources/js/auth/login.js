import { initFormValidation } from "../utils/form-validation";

const loginRules = {
    email: [
        { rule: "required", errorMessage: "Email is required" },
        { rule: "email", errorMessage: "Invalid email format" },
    ],
    password: [
        { rule: "required", errorMessage: "Password is required" },
        { rule: "minLength", value: 8, errorMessage: "Minimum 8 characters" },
    ],
};

initFormValidation(
    "#loginForm",
    loginRules,
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
