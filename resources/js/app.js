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
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";

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
// Tom Select
// =============================================
window.TomSelect = TomSelect;

// =============================================
// Initialize Lucide Icons
// =============================================
createIcons({ icons });
