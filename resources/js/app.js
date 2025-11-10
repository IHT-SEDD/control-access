// =============================================
// Core Dependencies
// =============================================
import "./bootstrap"; // Laravel Vite bootstrap (axios, CSRF, etc.)
import Alpine from "alpinejs"; // Alpine.js for reactive frontend behavior
import jQuery from "jquery"; // jQuery for DOM manipulation and AJAX
import JustValidate from "just-validate"; // Client-side form validation
import { createIcons, icons } from "lucide"; // Lucide icon library
import "./script"; // Custom project-specific JavaScript

// =============================================
// Initialize Alpine.js
// =============================================
window.Alpine = Alpine;
Alpine.start();

// =============================================
// Register Global Libraries
// =============================================
window.jQuery = jQuery;
window.$ = jQuery;
window.JustValidate = JustValidate;

// =============================================
// Initialize Lucide Icons
// =============================================
createIcons({ icons });
