<script>
    $(document).ready(function() {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $( "#add_candidate_form" ).validate({
        rules: {
            name: {
                required: true
            },
            gender: {
                required: true
            },
            // c_email: {
            //     required: true
            // },
            phone: {
                required: true
            },
            department: {
                required: true
            },
            user_name: {
                required: true,
                // remote: "check-username-exist?type=1"
            },
            password: {
                required: true
            },
            time: {
                required: true
            },
            test_type: {
                required: true
            },
            address: {
                required: true
            },
            education: {
                required: true
            },
            skill: {
                required: true
            },
            current_salary: {
                required: true
            },
            expected_salary: {
                required: true
            },
            notice_period: {
                required: true
            },
            total_experience: {
                required: true
            },
            resume: {
                required: true
            }
        },
        messages: {
            user_name: {
                remote: "this username already exist."
            }
        },
        submitHandler: function(form) {

            
            var form_data = $('#add_candidate_form').serialize();

            showAlert();
            $.ajax({
                url : '{{route("add.candidate")}}',
                type: 'POST',
                data: new FormData( form ),
                processData: false,
                contentType: false
            }).done(function(response){ //

                // var response = JSON.parse(response);
                if(response.status) {

                    $('#add_candidate_form').trigger("reset");
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
            icon: base_url+'/loading-icon.gif',
            buttons: false
        });
    }

    $('.delete').click(function(){
        c_id=$(this).attr('c_id');
        $('#delete_c_id').val(c_id);
    });

    $('.delete-candidate').click(function(){

        var candidateId=$('#delete_c_id').val(c_id);

        $.ajax({
            url: '{{route("delete.candidate")}}',
            type: 'POST',
            data: candidateId
        })
        .done(function (response) { //

            if (response.status) {
                window.location.reload();
            } else {
                alert('fail');
            }
        });
    });
</script>

<script>
    $(document).on('click','.edit-candidate',function(){
        var c_id = $(this).data('c_id');
        $('#editCandidateModal').modal('show');
        $.ajax({
            url: '{{route("edit.candidate")}}',
            type: 'get',
            data: {c_id: c_id},
            success: function(response){
                $('.edit-candidate-modal').append(response.html);
            }
        });
    });


    $(document).on('submit','#edit-candidate-form',function(e){
        e.preventDefault();

        var form_data = $('#edit-candidate-form').serialize();
        
        


        $(this).validate({
            rules: {
                name: {
                    required: true
                },
                phone: {
                    required: true
                },
                user_name: {
                    required: true,
                },
                department: {
                    required: true
                },
                current_salary: {
                    required: true
                },
                total_experience: {
                    required: true
                },
                time: {
                    required: true
                },
                education: {
                    required: true
                },
                password: {
                    required: true
                },
                skill: {
                    required: true
                },
                expected_salary: {
                    required: true
                },
                notice_period: {
                    required: true
                },
                test_type: {
                    required: true
                }
            },
            messages: {
                user_name: {
                    remote: "this username already exist."
                }
            },
            submitHandler: function() {
                var form_data = $('#edit-candidate-form').serialize();
                // alert(form_data)

                $.ajax({
                    url : '{{route("update.candidate")}}',
                    type: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: 'Application/json',
                }).then(function (response) { //

                    if (response.status) {

                        //swal.close();

                        //swal({
                        //    icon: 'success',
                        //    title: response.msg,
                        //    showConfirmButton: false,
                        //    timer: 1500
                        //})
                        
                        window.location.reload();

                    } else {

                        alert('fail');
                    }
                })
                .catch(function(response){
                    alert(response,'================================================')
                })
                ;
            }

        });
    })
</script>