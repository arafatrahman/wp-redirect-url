jQuery(document).ready(function ($) {

    var wpruId = 0;

    $('#addwpruRow').on('click', function (e) {
        e.preventDefault();
        var newWPRU = '<div id="wpruList' + wpruId + '" class="kau-action-field-row">' +
                '<div class="wpru-name"><input type="text" class="form__field" placeholder="Name of Redirection" name="name[]" /></div>' +
                '<div class="wpru-ru-field"><input type="text" class="form__field" placeholder="Request url" name="requestUrl[]" /></div>' +
                '<div class="wpru-du-field">' +
                '<input type="text" class="form__field" placeholder="Destination url" name="destinationUrl[]" /> ' +
                '</div>' +
                '<div class="wpru-action-field">' +
                '<a href="#" class="remove-wpru" data-id="' + wpruId + '"><button type="button" class="block">Remove URL</button></a></div>' +
                '</div>';

        '</div>';

        $('#addWPRU').before(newWPRU);

        wpruId++;

        $('.remove-wpru').on('click', function (e) {

            e.preventDefault();
            var id = $(this).data('id');
            $('#wpruList' + id).remove();

        });

    });
    $('.delete-wpru').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#wpruFields' + id).remove();
    });

});


