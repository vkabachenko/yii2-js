// go to the action by ajax and send rendering html to modal window

function ajaxModal(link,header) {

    $.get($(link).attr('href'),function(data) {

        $('#modalWindow .modal-header h2').text(header);
        $('#modalWindow .modal-body').html(data);
        $('#modalWindow').modal('show');
    });
    return false;

}

// all click handlers in grid buttons
function clickHandlers() {
    $('.actionView').click(function(){
        return ajaxModal(this,'View country');
    });

    $('.actionUpdate').click(function(){
        return ajaxModal(this,'Update country');
    });

    $('#actionCreate').click(function(){
        return ajaxModal(this,'New country');
    });

    $('.actionDelete').click(function(){
        return ajaxModal(this,'Delete country');
    });
}

// reactivate handlers after each pjax update
$('#pjaxWrap').on('pjax:success',function() {
    clickHandlers();
});

// first run
clickHandlers();
