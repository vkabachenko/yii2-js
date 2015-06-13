
var list = $('#country');

list.change(function() {
    var url = list.val();

    if (url) {
        // clear old modal header
        $('#modalWindow .modal-header h3').remove();

        // country name - from selected optiion
        var countryName = $('#country option:selected').text();

        // new modal header
       $('<h3></h3>')
        .appendTo($('#modalWindow .modal-header'))
        .text('States/regions for '+countryName);

        //
        $('#modalWindow .modal-body').load(url);

        $('#modalWindow').modal('show');
    }
});

// after closing the modal window list returns to prompt
$('#modalWindow').on('hidden.bs.modal', function () {

    list.val('');

});