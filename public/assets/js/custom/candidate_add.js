$(document).ready(function() {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});



$( "#myform" ).validate({
    rules: {
        c_name: {
            required: true
        },
        c_gender: {
            required: true
        },
        // c_email: {
        //     required: true
        // },
        c_mobile: {
            required: true
        },
        c_department: {
            required: true
        },
        c_user_name: {
            required: true,
            remote: "check-username-exist?type=1"
        },
        c_password: {
            required: true
        },
        c_time: {
            required: true
        },
        t_questions: {
            required: true
        },
        t_mode: {
            required: true
        },
        c_address: {
            required: true
        },
        c_education: {
            required: true
        },
        c_skill: {
            required: true
        },
        c_current_salary: {
            required: true
        },
        c_expected_salary: {
            required: true
        },
        c_notice_period: {
            required: true
        },
        c_total_experience: {
            required: true
        },
        c_resume: {
            required: true
        }
    },
    messages: {
        c_user_name: {
            remote: "this username already exist."
        }
    },
    submitHandler: function(form) {

        var form_data = $('#myform').serialize();
        showAlert()

        $.ajax({
            url : '',
            type: 'POST',
            data: new FormData( form ),
            processData: false,
            contentType: false
        }).done(function(response){ //

            var response = JSON.parse(response);
            if(response.status) {

                $('#myform').trigger("reset");
                swal.close();

                swal({
                    icon: 'success',
                    title: response.msg,
                    showConfirmButton: false,
                    timer: 3000
                })

                location.reload();

            } else {

                swal.close();

                swal({
                    icon: 'error',
                    title: response.msg,
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        });
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

$('.delete').click(function(){
    c_id=$(this).attr('c_id');
    $('#delete_c_id').val(c_id);
});

$('.form-delete-submit').click(function(){

    candidateId=$('#delete_c_id').val(c_id);

    $.ajax({
        url: 'delete-candidate',
        type: 'POST',
        data: candidateId
    })
    .done(function (response) { //

        var response = JSON.parse(response);
        if (response.status) {
            window.location.reload();
        } else {
            alert('fail');
        }
    });
});