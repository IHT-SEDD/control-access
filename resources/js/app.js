// =============================================
// Core Dependencies
// =============================================
import "./bootstrap";
import Alpine from "alpinejs";
import jQuery from "jquery";
import JustValidate from "just-validate";
import { createIcons, icons } from "lucide";
import "tabulator-tables/dist/css/tabulator.min.css";
import { TabulatorFull as Tabulator } from "tabulator-tables";

// =============================================
// Initialize Alpine.js
// =============================================
window.Alpine = Alpine;
Alpine.start();

// =============================================
// Initialize Jquery
// =============================================
window.jQuery = jQuery;
window.$ = jQuery;

// =============================================
// Initialize JustValidate
// =============================================
window.JustValidate = JustValidate;

// =============================================
// Initialize Tabulator
// =============================================
window.Tabulator = Tabulator;

// =============================================
// Initialize Lucide Icons
// =============================================
createIcons({ icons });
