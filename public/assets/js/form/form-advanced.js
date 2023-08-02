$(function() {


    // Multiselect
    $('#multiselect1, #multiselect2, #single-selection, #multiselect5, #multiselect6').multiselect();
    //Multi-select
    $('#optgroup').multiSelect({ selectableOptgroup: true });


    $('#multiselect3-all').multiselect({
        includeSelectAllOption: true,
    });

    $('#multiselect4-filter').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        maxHeight: 200
    });

    $('#multiselect-size').multiselect({
        buttonClass: 'btn btn-default btn-sm'
    });

    $('#multiselect-link').multiselect({
        buttonClass: 'btn btn-link'
    });

    $('#multiselect-color').multiselect({
        buttonClass: 'btn btn-primary'
    });

    $('#multiselect-color2').multiselect({
        buttonClass: 'btn btn-success'
    });
});

$(function() {
    "use strict";

    $('.dropify').dropify();

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });
});
