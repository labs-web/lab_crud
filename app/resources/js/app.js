import 'bootstrap';
// Import jQuery
import 'https://code.jquery.com/jquery-3.6.0.min.js';
// select2
import 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js';

// Import AdminLTE
import "admin-lte/dist/js/adminlte";
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle';
import 'admin-lte/dist/js/adminlte';
import './app.recherche';

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

$(document).ready(function () {
    // Fonction pour mettre à jour un paramètre dans l'URL
    function updateURLParameter(param, paramVal) {
        var url = window.location.href;
        var hash = location.hash;
        url = url.replace(hash, "");
        if (url.indexOf(param + "=") >= 0) {
            var prefix = url.substring(0, url.indexOf(param + "="));
            var suffix = url.substring(url.indexOf(param + "="));
            suffix = suffix.substring(suffix.indexOf("=") + 1);
            suffix =
                suffix.indexOf("&") >= 0
                    ? suffix.substring(suffix.indexOf("&"))
                    : "";
            url = prefix + param + "=" + paramVal + suffix;
        } else {
            if (url.indexOf("?") < 0) url += "?" + param + "=" + paramVal;
            else url += "&" + param + "=" + paramVal;
        }
        window.history.replaceState({ path: url }, "", url + hash);
    }

})

$(document).ready(function() {
    console.log("Document is ready.");
    $('.select2').select2();
});