<div class="modal-header">
    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">EDIT CANDIDATE DETAILS </h4>
</div>
<form id="emyform" method="post" enctype="multipart/form-data">
    <div class="modal-body" style="padding-bottom: 0;">
        <div class="box box-solid">
            <div class="box-body">
                <dl class="dl-horizontal">

                    <div class="row">

						<div class="col-md-6 col-sm-6 col-xs-6">

						<div class="dash-item first-dash-item">
							<div class="inner-item" style="padding-bottom: 0;">
								<div class="dash-form" style="padding-bottom: 0;">

									<label class="clear-top-margin">NAME</label>
									<input placeholder="Enter Candidate Name" name="c_name" value="<?=$candidate_detail->name?>" >

									<label >PHONE</label>
									<input placeholder="Enter Candidate Phone" name="c_phone" value="<?=$candidate_detail->phone?>" >


									<label>USERNAME</label>
									<input placeholder="Enter Username" name="c_user_name" value="<?=$candidate_detail->user_name?>" >


									<label>DEPARTMENT</label>
									<input placeholder="Enter Department" name="c_department" value="<?=$candidate_detail->department?>" >


									<label></i>CURRENT SALARY</label>
									<input placeholder="Enter Current Salary" name="c_current_salary" value="<?=$candidate_detail->current_salary?>" >

									<label>TOTAL EXPERIENCE</label>
									<input placeholder="Enter Total Experience" name="c_total_experience" value="<?=$candidate_detail->total_experience?>" >


									<label>TIME ( MINUTE )</label>
									<input type='number' placeholder="Enter Time in Minute" name="c_time" value="<?=$candidate_detail->time?>" >


								</div>
							</div>
						</div>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-6">

						<div class="dash-item first-dash-item">
							<div class="inner-item" style="padding-bottom: 0;">
								<div class="dash-form" style="padding-bottom: 0;">

									<label class="clear-top-margin">Email</label>
									<input placeholder="Enter Candidate Email" name="c_email" value="<?=$candidate_detail->email?>" >


									<label>EDUCATION</label>
									<input placeholder="Enter Education" name="c_education" value="<?=$candidate_detail->education?>" >


									<label>PASSWORD</label>
									<input placeholder="Enter Username" name="c_password" value="<?=$candidate_detail->password?>" >

									<label>SKILL</label>
									<input placeholder="Enter Skill" name="c_skill" value="<?=$candidate_detail->skill?>" >


									<label>EXPECTED SALARY</label>
									<input placeholder="Enter Expected Salary" name="c_expected_salary" value="<?=$candidate_detail->expected_salary?>" >


									<label>NOTICE PERIOD</label>
									<input placeholder="Enter Notice Period" name="c_notice_period" value="<?=$candidate_detail->notice_period?>" >


									<div>
										<label>TEST MODE</label>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="edefaultInline4"
												   name="t_mode" value="1" <?php echo ($candidate_detail->test_type== '1') ?  "checked" : "" ;?>>
											<label class="custom-control-label color-gray" for="edefaultInline4">Very Easy</label>
										</div>

										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="edefaultInline5"
												   name="t_mode" value="2" <?php echo ($candidate_detail->test_type== '2') ?  "checked" : "" ;?>>
											<label class="custom-control-label color-gray" for="edefaultInline5">Easy</label>
										</div>

										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="edefaultInline6"
												   name="t_mode" value="3" <?php echo ($candidate_detail->test_type== '3') ?  "checked" : "" ;?>>
											<label class="custom-control-label color-gray" for="edefaultInline6">Medium</label>
										</div>

										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="edefaultInline7"
												   name="t_mode" value="4" <?php echo ($candidate_detail->test_type== '4') ?  "checked" : "" ;?>>
											<label class="custom-control-label color-gray" for="edefaultInline7">Hard</label>
										</div>

										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="edefaultInline8"
												   name="t_mode" value="5" <?php echo ($candidate_detail->test_type== '5') ?  "checked" : "" ;?>>
											<label class="custom-control-label color-gray" for="edefaultInline8">Very Hard</label>
										</div>

										<label id="t_mode-error" class="error" for="t_mode"></label>
									</div>
								</div>
							</div>
						</div>
					</div>		

                </dl>
            </div><!-- /.box-body -->
        </div>

    </div>

    <div class="modal-footer">
        <input type="hidden" name="que_id" id='que_id' value='<?php echo $id; ?>'/>
        <button class="btn btn-success form-edit-submit" type="submit">Update</button>
        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
    </div>
</form>

<script>

    $("#emyform").validate({
        rules: {
            c_name: {
                required: true
            },
            c_phone: {
                required: true
            },
            c_user_name: {
                required: true,
                remote: "check-username-exist?type=2&id=<?=$id?>"
            },
            c_department: {
                required: true
            },
            c_current_salary: {
                required: true
            },
            c_total_experience: {
                required: true
            },
            c_time: {
                required: true
            },

//            c_email: {
//                required: true
//            },
            c_education: {
                required: true
            },
            c_password: {
                required: true
            },
            c_skill: {
                required: true
            },
            c_expected_salary: {
                required: true
            },
            c_notice_period: {
                required: true
            },
//            t_questions: {
//                required: true
//            },
            t_mode: {
                required: true
            }
        },
        messages: {
            c_user_name: {
                remote: "this username already exist."
            }
        },
        submitHandler: function (form) {

            var form_data = $('#emyform').serialize();
            showAlert()

            $.ajax({
                url: 'edit-candidate/<?=$id?>',
                type: 'POST',
                data: form_data
            }).done(function (response) { //

                var response = JSON.parse(response);
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
            });
        }

    });
</script>