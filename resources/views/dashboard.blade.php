@extends('layouts.app')

@section('content')
<!-- MAIN CONTENT -->
<style>
    /*input[type="radio"] {*/
    /*display: none;*/
    /*}*/

    /*input[type="radio"] + label span {*/
    /*display: inline-block;*/
    /*width: 10px;*/
    /*height: 10px;*/
    /*background: transparent;*/
    /*vertical-align: middle;*/
    /*border: 2px solid #f56;*/
    /*border-radius: 50%;*/
    /*padding: 2px;*/
    /*margin: 0 5px;*/
    /*}*/

    /*input[type="radio"]:checked + label span {*/
    /*width: 10px;*/
    /*height: 10px;*/
    /*background: #f56;*/
    /*background-clip: content-box;*/
    /*}*/

    .custom-control-inline {
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin-right: 1rem;
    }

    .custom-control {
        position: relative;
        display: inline;
        min-height: 1.5rem;
        padding-left: 1.5rem;
    }

    .custom-control input {
        width: auto;
    }

    .custom-control-input {
        position: absolute;
        left: 0;
        z-index: -1;
        width: 1rem;
        height: 1.25rem;
        opacity: 0;
    }

    .custom-control label {

        display: inline;
    }

    .custom-control-label::after {
        position: absolute;
        top: 0.25rem;
        left: -1.5rem;
        display: block;
        width: 1rem;
        height: 1rem;
        content: "";
        background: no-repeat 50% / 50% 50%;
        background-image: none;
    }

    .custom-control-input:checked ~ .custom-control-label::before {
        color: #fff;
        border-color: #007bff;
        background-color: #007bff;
    }

    .custom-radio .custom-control-label::before {
        border-radius: 50%;
    }

    .custom-control-label::before, .custom-file-label, .custom-select {
        transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-control-label::before {
        position: absolute;
        top: 2px;
        left: -20px;
        display: block;
        width: 15px;
        height: 15px;
        pointer-events: none;
        content: "";
        background-color: #fff;
        border: #adb5bd solid 1px;
        border-top-color: rgb(173, 181, 189);
        border-right-color: rgb(173, 181, 189);
        border-bottom-color: rgb(173, 181, 189);
        border-left-color: rgb(173, 181, 189);
    }

    .custom-control-label {
        position: relative;
        margin-bottom: 0;
        vertical-align: top;
    }

    .online-test-options input[type="radio"] {
        vertical-align: text-bottom;
        margin-right: 5px;
    }

    .valid_img {
        width: 20px;
        height: 20px;
        margin-left: 2px;
        margin-top: -5px;
    }

    .question {
        margin-bottom: 20px;
    }

    .edit_question {
        cursor: pointer;
    }

    code[class*="language-"], pre[class*="language-"] {
        color: #000;
        text-shadow: 0 1px #fff;
        font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
        font-size: 1em;
        text-align: left;
        white-space: pre;
        word-spacing: normal;
        word-break: normal;
        word-wrap: normal;
        line-height: 1.5;
        -moz-tab-size: 4;
        -moz-hyphens: none;
        hyphens: none;
    }

    .color-gray {
        color: gray !important;
    }

    .disabled {
        pointer-events: none;
        cursor: default;
        background: #C1C3C2 !important;
    }
	
	.modal-delete-header{
		padding:15px;border-bottom:1px solid #d9534f
	}
	
	.action-link .info {
		background: #5282e9;
	}
</style>
<div class="main-content" id="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-file-text-o"></i>CANDIDATES</h5>
                <div class="section-divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-sm-12">
                    <div class="dash-item first-dash-item">
                        <div class="row" style="border-bottom: 1px solid #eee;">
                            <div class="col-sm-10">
                                <h6 class="item-title"><i class="fa fa-sliders"></i>ALL CANDIDATES</h6>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary btn-sm" style="margin: 5px 0 5px 40px;padding: 6px 12px;" data-toggle="modal" data-target="#addCandidateModal"><i class="fa fa-plus"></i>  Add Candidate</button>
                            </div>
                        </div>
                        <div class="inner-item">

                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
									<th>CONTACT INFO.</th>
                                    <th>DEPART.</th>
                                    <th>USER NAME</th>
                                    <th>PASSWORD</th>
                                    <th>TEST MODE</th>
                                    <th>STATUS</th>
									<th>ENTRY DATE</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($users as $key => $user)                                    
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
										<td style="padding: 0px;">{{ $user->phone }}<br>{{ (empty($user->email) ? '': $user->email) }}</td>
                                        <td>{{ $user->department }}</td>
                                        <td>{{ $user->user_name }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td><?php
                                            switch ($user->test_type) {

                                                case 1:
                                                    echo "Very Easy";
                                                    break;
                                                case 2:
                                                    echo "Easy";
                                                    break;
                                                case 3:
                                                    echo "Medium";
                                                    break;
                                                case 4:
                                                    echo "Hard";
                                                    break;
                                                case 5:
                                                    echo "Very Hard";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td><?php
                                            switch ($user->status) {

                                                case 0:
                                                    echo "Pending";
                                                    break;
                                                case 1:
                                                    echo "Start";
                                                    break;
                                                case 2:
                                                    echo $user->score;
                                                    break;
                                            }
                                            ?>
                                        </td>
										<td>{{ date('d M, Y',strtotime($user->created_at)) }}</td>
                                        <td class="action-link" data-c_id="{{ $user->id }}">
                                            <a class="edit-candidate edit {{ ($user->status == 0) ? '' : 'disabled' }}"><i class="fa fa-edit"></i></a>
                                            <a class="edit {{ ($user->status == 2) ? '' : 'disabled' }}" ><i class="fa fa-tasks"></i></a>
                                            <a class="view-test-result edit" href="#" title="View Result"><i class="fa fa-quora"></i></a>
											<a class="info" target="_blank" href="{{ asset('uploads/resume/'.$user->resume) }}" title="View Resume" ><i class="fa fa-file"></i></a>
											
											<a class="delete {{ ($user->status == 0) ? '' : 'disabled' }}" href="" c_id="{{ $user->id }}" title="Delete" data-toggle="modal" data-target="#deleteDetailModal"><i
											class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-togggle-btn">
        <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>
    <div class="dash-footer col-lg-12">
        <div class="col-lg-6">
            <p>Copyright JKSOL</p>
        </div>
    </div>


    <!--Add Candidate modal-->
    <div id="addCandidateModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 80%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i>Add CANDIDATE</h4>
                </div>
                <div class="modal-body" style="padding: 0;">
                    <div class="dash-item first-dash-item">
                        {{-- <h6 class="item-title"><i class="fa fa-plus-circle"></i>ADD CANDIDATE</h6> --}}
                        <div class="inner-item">
                            <form id="add_candidate_form" method="post" enctype="multipart/form-data">
                                <div class="dash-form">

                                    <label class="clear-top-margin"><i class="fa fa-tasks"></i>NAME</label>
                                    <input placeholder="Enter Candidate Name" name="name">

                                    <label><i class="fa fa-tasks"></i>GENDER</label>
                                    <select name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>

                                    <label><i class="fa fa-tasks"></i>EMAIL</label>
                                    <input type="email" placeholder="Enter Email" name="email">


                                    <label><i class="fa fa-tasks"></i>MOBILE NUMBER</label>
                                    <input type="number" placeholder="Enter Mobile Number" name="phone">

                                    <label><i class="fa fa-tasks"></i>DEPARTMENT</label>
                                    <input placeholder="Enter Department" name="department">


                                    <label><i class="fa fa-user-secret"></i>USERNAME</label>
                                    <input placeholder="Enter Username" name="user_name">


                                    <label><i class="fa fa-key"></i>PASSWORD</label>
                                    <input placeholder="Enter Password" name="password">


                                    <label><i class="fa fa-clock-o"></i>TIME ( MINUTE )</label>
                                    <input type='number' placeholder="Enter Time in Minute" name="time">

                                    <div>
                                        <label><i class="fa fa-pencil"></i>TEST MODE</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline4"
                                                    name="test_type" value="1">
                                            <label class="custom-control-label color-gray" for="defaultInline4">Very
                                                Easy</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline5"
                                                    name="test_type" value="2">
                                            <label class="custom-control-label color-gray"
                                                    for="defaultInline5">Easy</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline6"
                                                    name="test_type" value="3">
                                            <label class="custom-control-label color-gray"
                                                    for="defaultInline6">Medium</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline60"
                                                    name="test_type" value="4">
                                            <label class="custom-control-label color-gray"
                                                    for="defaultInline60">Hard</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline61"
                                                    name="test_type" value="5">
                                            <label class="custom-control-label color-gray" for="defaultInline61">Very
                                                Hard</label>
                                        </div>

                                        <label id="test_type-error" class="error" for="test_type"></label>
                                    </div>

                                    <label><i class="fa fa-key"></i>ADDRESS</label>
                                    <textarea placeholder="Enter Address" name="address"></textarea>

                                    <label><i class="fa fa-key"></i>EDUCATION</label>
                                    <textarea placeholder="Enter Education" name="education"></textarea>

                                    <label><i class="fa fa-file"></i>SKILL</label>
                                    <input name="skill">

                                    <label><i class="fa fa-file"></i>CURRENT SALARY</label>
                                    <input type="number" name="current_salary">

                                    <label><i class="fa fa-file"></i>EXPECTED SALARY</label>
                                    <input type="number" name="expected_salary">

                                    <label><i class="fa fa-tasks"></i>NOTICE PERIOD</label>
                                    <select name="notice_period">
                                        <option value="">Select Notice Period</option>
                                        <option value="4">Immediate </option>
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Month</option>
                                        <option value="3">3 Month</option>
                                    </select>

                                    <label><i class="fa fa-file"></i>TOTAL EXPERIENCE</label>
                                    <input name="total_experience">

                                    <label><i class="fa fa-file"></i>Resume</label>
                                    <input type="file" name="resume">

                                    <div>
                                        <a href="#" class="form-submit"><i class="fa fa-paper-plane"></i> CREATE</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!--Edit details modal-->
    <div id="editCandidateModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 80%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>EDIT CANDIDATE DETAILS</h4>
                </div>
                <div class="modal-body edit-candidate-modal" style="padding: 0;">
                    <span class="fa fa-spinner fa-spin"></span> Loading...
                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                </div>

            </div>
        </div>
    </div>


    <!--View details modal-->
    <div id="viewResultModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>VIEW CANDIDATE RESULT</h4>
                </div>
                <div class="modal-body">
                    <span class="fa fa-spinner fa-spin"></span> Loading...
                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                </div>

            </div>
        </div>
    </div>
	
	<div id="deleteDetailModal" class="modal fade" tabindex="-1"  role="dialog" >
        <div class="modal-dialog" style="max-width: 29% !important;">
            <div class="modal-content">
                <div class="modal-delete-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></i>DELETE CANDIDATE</h4>
                </div>
                    <div class="modal-body">
                    <input type="text" id="delete_c_id" name="c_id" hidden>
                        Are you really want to delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                        <button type="submit" name="deleteCandidateBtn" class="btn btn-danger delete-candidate">Delete</button>
                    </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@push('scripts')
    @include('candidate-script')
@endpush