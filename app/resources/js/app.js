// Importation des dépendances Bootstrap et AdminLTE
import "bootstrap";
import "https://code.jquery.com/jquery-3.6.0.min.js";
import "../../node_modules/admin-lte/dist/js/adminlte";
import "admin-lte/plugins/jquery/jquery";
// Import jQuery
import "jquery/dist/jquery";
// Import AdminLTE
import "admin-lte/dist/js/adminlte";
import "admin-lte/plugins/bootstrap/js/bootstrap.bundle";
import "admin-lte/dist/js/adminlte";
import './app.recherche'

// Importation de CKEditor
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

document.addEventListener("DOMContentLoaded", function () {
    // Initialisation de CKEditor
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error(
                "There was a problem initializing the editor.",
                error
            );
        });
});


