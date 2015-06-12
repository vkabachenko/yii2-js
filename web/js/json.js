// var urlAjax - external !!! see in head section


$('#country').change(function(){

    var state = $('#state');

    // clear previous data
    state.children().each(function(index) {
        if (index) { // leaving prompt in place
         $(this).remove();
        }
    }).
    val(''); // to first option (prompt)

    var id_country = $('#country').val();

    if (id_country) { // if not prompt
        $.ajax({
            'url' :urlAjax,
            'data' : { 'id_country' : id_country }, // request (GET by default)
            'dataType' : 'json',
            'success' : fillState,
            'error' : function() {
                alert('Error occured while processing ajax request')
            }
        });
    }

});


// fill state select tag by states list of selected country
    function fillState(dataArr) {

        $.each(dataArr,function(index,data) {

            $('<option></option>').
                appendTo(state).
                val(data.id).
                text(data.name);
        })

    }




