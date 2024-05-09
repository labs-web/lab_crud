
import 'bootstrap';

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

import "../../node_modules/admin-lte/dist/js/adminlte";

$(document).ready(function() {
    function updateURLParameter(param, paramVal) {
        var url = window.location.href;
        var hash = location.hash;
        url = url.replace(hash, '');
        if (url.indexOf(param + "=") >= 0) {
            var prefix = url.substring(0, url.indexOf(param + "="));
            var suffix = url.substring(url.indexOf(param + "="));
            suffix = suffix.substring(suffix.indexOf("=") + 1);
            suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
            url = prefix + param + "=" + paramVal + suffix;
        } else {
            if (url.indexOf("?") < 0)
                url += "?" + param + "=" + paramVal;
            else
                url += "&" + param + "=" + paramVal;
        }
        window.history.replaceState({ path: url }, '', url + hash);
    }

    function fetchData(page, searchValue) {
        $.ajax({
            url: '/projets/?page=' + page + '&searchValue=' + searchValue,
            success: function(data) {
                var newData = $(data);

                $('tbody').html(newData.find('tbody').html());
                $('#card-footer').html(newData.find('#card-footer').html());
                var paginationHtml = newData.find('.pagination').html();
                if (paginationHtml) {
                    $('.pagination').html(paginationHtml);
                } else {
                    $('.pagination').html('');
                }
            }
        });
        console.log(searchValue);
        if (page !== null && searchValue !== null) {
            updateURLParameter('page', page);
            updateURLParameter('searchValue', searchValue);
        } else {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }

    $('body').on('click', '.pagination a', function(param) {
        param.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        console.log("Clicked on page: " + page);
        var searchValue = $('#table_search').val();
        fetchData(page, searchValue);
    });
    

    $('body').on('keyup', '#table_search', function() {
        var page = $('#page').val();
        var searchValue = $(this).val();
        fetchData(page, searchValue);
    });

   
});



function submitForm() {
    document.getElementById("importForm").submit();
}
