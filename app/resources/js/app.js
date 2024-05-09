import 'bootstrap';
import "../../node_modules/admin-lte/dist/js/adminlte";
import 'admin-lte/plugins/jquery/jquery';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle';
import 'admin-lte/dist/js/adminlte';
// Import CKEditor
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
});