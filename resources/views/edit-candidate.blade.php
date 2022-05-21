<form id="edit-candidate-form" method="post" enctype="multipart/form-data">

    <div class="modal-body" style="padding: 0;">
        <div class="box box-solid">
            <div class="box-body">
                <dl class="dl-horizontal">

                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <div class="dash-item first-dash-item">
                                <div class="inner-item" style="padding-bottom: 0;">
                                    <div class="dash-form" style="padding-bottom: 0;">

                                        <label class="clear-top-margin">NAME</label>
                                        <input placeholder="Enter Candidate Name" name="name" value="{{ $candidate->name }}">

                                        <label>PHONE</label>
                                        <input placeholder="Enter Candidate Phone" name="phone" value="{{ $candidate->phone }}">


                                        <label>USERNAME</label>
                                        <input placeholder="Enter Username" name="user_name" value="{{ $candidate->user_name }}">


                                        <label>DEPARTMENT</label>
                                        <input placeholder="Enter Department" name="department" value="{{ $candidate->department }}">


                                        <label></i>CURRENT SALARY</label>
                                        <input placeholder="Enter Current Salary" name="current_salary" value="{{ $candidate->current_salary }}">

                                        <label>TOTAL EXPERIENCE</label>
                                        <input placeholder="Enter Total Experience" name="total_experience" value="{{ $candidate->total_experience }}">


                                        <label>TIME ( MINUTE )</label>
                                        <input type='number' placeholder="Enter Time in Minute" name="time" value="{{ $candidate->time }}">


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <div class="dash-item first-dash-item">
                                <div class="inner-item" style="padding-bottom: 0;">
                                    <div class="dash-form" style="padding-bottom: 0;">

                                        <label class="clear-top-margin">Email</label>
                                        <input placeholder="Enter Candidate Email" name="email" value="{{ $candidate->email }}">


                                        <label>EDUCATION</label>
                                        <input placeholder="Enter Education" name="education" value="{{ $candidate->education }}">


                                        <label>PASSWORD</label>
                                        <input placeholder="Enter Username" name="password" value="{{ $candidate->password }}">

                                        <label>SKILL</label>
                                        <input placeholder="Enter Skill" name="skill" value="{{ $candidate->skill }}">


                                        <label>EXPECTED SALARY</label>
                                        <input placeholder="Enter Expected Salary" name="expected_salary" value="{{ $candidate->expected_salary }}">


                                        <label>NOTICE PERIOD</label>
                                        <input placeholder="Enter Notice Period" name="notice_period" value="{{ $candidate->notice_period }}">


                                        <div>
                                            <label>TEST MODE</label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="edefaultInline4" name="test_type" value="1" <?php echo $candidate->test_type == '1' ? 'checked' : ''; ?>>
                                                <label class="custom-control-label color-gray" for="edefaultInline4">Very Easy</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="edefaultInline5" name="test_type" value="2" <?php echo $candidate->test_type == '2' ? 'checked' : ''; ?>>
                                                <label class="custom-control-label color-gray" for="edefaultInline5">Easy</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="edefaultInline6" name="test_type" value="3" <?php echo $candidate->test_type == '3' ? 'checked' : ''; ?>>
                                                <label class="custom-control-label color-gray" for="edefaultInline6">Medium</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="edefaultInline7" name="test_type" value="4" <?php echo $candidate->test_type == '4' ? 'checked' : ''; ?>>
                                                <label class="custom-control-label color-gray" for="edefaultInline7">Hard</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="edefaultInline8" name="test_type" value="5" <?php echo $candidate->test_type == '5' ? 'checked' : ''; ?>>
                                                <label class="custom-control-label color-gray" for="edefaultInline8">Very Hard</label>
                                            </div>

                                            <input type="hidden" name="que_id" id='que_id' value='<?php echo $candidate->id; ?>' />
                                            <label id="test_type-error" class="error" for="test_type"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </dl>
            </div><!-- /.box-body -->
        </div>

    </div>

    <div style="margin: 0 0 8px 45px;">
        <button class="btn btn-success form-edit-submit" type="submit" >Update</button>
    </div>
</form>
