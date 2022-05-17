$('input[name="qa_type"]').click(function(){

    var inputValue = $(this).attr("value");

    if(inputValue == 1){

        $('#div-options .q-option').removeAttr('disabled');
        $('#div-write .q-option').attr('disabled','disabled');

        $('#div-write').hide();
        $('#div-options').show();

    }else{

        $('#div-options .q-option').attr('disabled','disabled');
        $('#div-write .q-option').removeAttr('disabled');
        $('#div-options').hide();
        $('#div-write').show();

    }
});







$( "#myform" ).validate({
    rules: {
        qa_type: {
            required: true
        },
        q_mode: {
            required: true
        }
    },
    submitHandler: function(form) {

        var q_name = $('textarea[name="q_name"]').val();
        var q_code = $('textarea[name="q_code"]').val();
        var fileName = $('input[name="q_image"]').val();

        if (!q_name && !q_code && !fileName) {

            $("#myform").validate().showErrors({
                'q_name': 'Please Write Question/Code/Question Image'
            });
            return false;
        }

        showAlert()

        var data = new FormData();
        var oReq = new XMLHttpRequest();
        oReq.open("POST", '', true);

        oReq.onload = function (oEvent) {

            // Uploaded.
            if (oReq.readyState === oReq.DONE) {

                if (oReq.status === 200) {

                    var response = JSON.parse(oReq.response);
                    if(response.status){

                        $('#myform').trigger("reset");
                        swal.close();

                        swal({
                            icon: 'success',
                            title: 'Question added successfully',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        location.reload();

                    }else{

                        alert('fail');
                    }
                }
            }
        };




        if($('input[name="qa_type"]:checked').val() == 1){

            var q_answer = $('input[name="oq_answer"]:checked').val();

        }else{
            var q_answer =$('input[name="q_answer"]').val();

        }


        data.append('q_name', $('textarea[name="q_name"]').val());
        data.append('q_code', $('textarea[name="q_code"]').val());
        data.append('qa_type', $('input[name="qa_type"]:checked').val());
        data.append('q_op1', $('input[name="q_op1"]').val());
        data.append('q_op2', $('input[name="q_op2"]').val());
        data.append('q_op3', $('input[name="q_op3"]').val());
        data.append('q_op4', $('input[name="q_op4"]').val());
        data.append('q_answer', q_answer);
        data.append('qa_mode', $('input[name="qa_mode"]:checked').val());
        data.append('q_mode', $('input[name="q_mode"]:checked').val());
        data.append('q_image', $('input[name="q_image"]')[0].files[0]);
        data.append('q_solution', $('textarea[name="q_solution"]').val());
        oReq.send(data);
    }

});

$('.form-submit').click(function() {

    $('form').submit();
});


function showAlert(){

    swal({
        title: "Please Wait!",
        closeOnClickOutside: false,
        closeOnEsc: false,
        text: "action perform",
        icon: base_url+'assets/loading-icon.gif',
        buttons: false
    });
}



$(document).ready(function() {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});

// $('body').on("click", '.edit_question', function (e) {
//
//     var id = $(this).data('id');
//     showAlert();
//
//     $.ajax({
//         url: base_url + "edit-question/"+id,
//         method: "GET"
//     }).done(function (data) {
//
//         swal.close();
//         console.log(data);
//     });
// });