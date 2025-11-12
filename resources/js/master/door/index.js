"use strict";

export const formId = '#form-create';

export const formRules = {
    name: [
        { rule: "required", errorMessage: "Name is required" }
    ],
    password: [
        { rule: "required", errorMessage: "Password is required" },
        { rule: "minLength", value: 8, errorMessage: "Minimum 8 characters" },
    ],
};
