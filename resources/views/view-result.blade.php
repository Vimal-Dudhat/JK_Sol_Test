<div class="modal-header">
    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">VIEW CANDIDATE RESULT</h4>
</div>
<div class="modal-body">
    <div class="box box-solid">
        <div class="box-body">
            <dl class="dl-horizontal">

                <div class="dash-item first-dash-item">
                    <div class="inner-item" style="padding-bottom: 0px;">
                        <div class="dash-form">

                            <?php
                            if ($type == 1) {
                                ?>

                                <style>
                                    .scoreTable {
                                        margin-left: auto;
                                        margin-right: auto;
                                        margin-top: 0px;
                                        width: 50%;
                                    }

                                    #endTestStats td, th {
                                        display: table-cell;
                                        padding: 10px 5px;
                                        text-align: left;
                                        vertical-align: middle;
                                        border-radius: 2px;
                                    }
                                </style>


                                <?php
                                function get_time_ago($time)
                                {
                                    if ($time < 60) {
                                        return round($time, 2) . ' second';
                                    }
                                    $condition = array(12 * 30 * 24 * 60 * 60 => 'year',
                                        30 * 24 * 60 * 60 => 'month',
                                        24 * 60 * 60 => 'day',
                                        60 * 60 => 'hour',
                                        60 => 'minute',
                                        1 => 'second'
                                    );

                                    foreach ($condition as $secs => $str) {
                                        $d = $time / $secs;

                                        if ($d >= 1) {
                                            $t = round($d, 2);
                                            return $t . ' ' . $str . ($t > 1 ? 's' : '');
                                        }
                                    }
                                }


                                $correct_answers = 0;
                                $wrong_answers = 0;
                                $unanswered = 0;
                                $total_answers = 0;

                                foreach ($question_info as $key => $value) {

                                    if ($value->candidate_answer == '') {

                                        $unanswered++;

                                    } else {

                                        $total_answers++;

                                        if (strtolower($value->candidate_answer) == strtolower($value->answer)) {

                                            $correct_answers++;

                                        } else {

                                            $wrong_answers++;
                                        }
                                    }
                                }


                                $difference_in_seconds = strtotime($candidate_info->end_time) - strtotime($candidate_info->start_time);
                                if (($candidate_info->time * 60) > $difference_in_seconds) {

                                    $time_used = gmdate("i:s", $difference_in_seconds);

                                } else {

                                    $time_used = $candidate_info->time;
                                }


                                $times_left = ($candidate_info->time * 60) - $difference_in_seconds;

                                if ($times_left > 0) {

                                    $time_left = gmdate("i:s", $times_left);
                                } else {
                                    $time_left = '00';
                                }


                                if ($total_answers == 0) {

                                    $jnk = '-';

                                } else {

                                    $jnk = $difference_in_seconds / $total_answers;
                                    $jnk = get_time_ago($jnk);
                                }

                                $score = ($correct_answers * 100) / count($question_info);
                                ?>

                                <div id="contentHolder">
                                    <div id="endTestStats">
                                        <div class="row div_end_test">
                                            <div class="col m12" style="text-align: center;">

                                                <?php
                                                $total_very_easy = $total_right_very_easy = $total_easy = $total_right_easy = $total_medium = $total_right_medium = $total_hard = $total_right_hard = $total_very_hard = $total_right_very_hard = 0;
                                                foreach ($question_info as $key => $value) {


                                                    if ($value->question_mode == 1) {
                                                        $total_very_easy++;
                                                        (check_answer($value)) ? $total_right_very_easy++ : '';
                                                    } else if ($value->question_mode == 2) {
                                                        $total_easy++;
                                                        (check_answer($value)) ? $total_right_easy++ : '';
                                                    } else if ($value->question_mode == 3) {
                                                        $total_medium++;
                                                        (check_answer($value)) ? $total_right_medium++ : '';
                                                    } else if ($value->question_mode == 4) {
                                                        $total_hard++;
                                                        (check_answer($value)) ? $total_right_hard++ : '';
                                                    } else if ($value->question_mode == 5) {
                                                        $total_very_hard++;
                                                        (check_answer($value)) ? $total_right_very_hard++ : '';
                                                    }
                                                }
												
												$startTIme = date(' d M, Y [h:i A',strtotime($candidate_info->start_time));
												$endTime = date('h:i A]',strtotime($candidate_info->end_time)); 
                                                ?>
                                                <table class="scoreTable">
                                                    <tbody>
													<tr>
														<td>Exam Time</td>
														<td><b>:&nbsp;&nbsp;<?php echo $startTIme. ' - ' .$endTime; ?></b></td>
													</tr>
                                                    <tr>
                                                        <td>Correct Answers</td>
                                                        <td>
                                                            <b>:&nbsp;&nbsp; <?php echo ceil(($correct_answers * 100) / count($question_info)); ?>
                                                                %</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wrong Answers</td>
                                                        <td>
                                                            <b>:&nbsp;&nbsp; <?php echo floor(($wrong_answers * 100) / count($question_info)); ?>
                                                                %</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unanswered</td>
                                                        <td>
                                                            <b>:&nbsp;&nbsp; <?php echo floor(($unanswered * 100) / count($question_info)); ?>
                                                                %</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Time used</td>
                                                        <td><b>: &nbsp;&nbsp;<?= $time_used ?> minutes</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Time left</td>
                                                        <td><b>: &nbsp;&nbsp;<?= $time_left ?> minutes</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Time per question</td>
                                                        <td><b>:&nbsp;&nbsp; <?= $jnk ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Very easy question</td>
                                                        <td><b>:&nbsp;&nbsp; <?= $total_very_easy.'/'.$total_right_very_easy ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Easy question</td>
                                                        <td><b>:&nbsp;&nbsp; <?= $total_easy.'/'.$total_right_easy ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medium question</td>
                                                        <td><b>:&nbsp;&nbsp; <?= $total_medium.'/'.$total_right_medium ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hard question</td>
                                                        <td><b>:&nbsp;&nbsp; <?= $total_hard.'/'.$total_right_hard ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Very Hard question</td>
                                                        <td><b>:&nbsp;&nbsp; <?= $total_very_hard.'/'.$total_right_very_hard ?></b></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <?php
                                foreach ($question_info as $key => $value) {
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading online-test" role="tab" id="">
                                            <b>Question <?= $value->que_id ?> : <?php if ($value->question_mode == 1) {
                                                    echo 'Very Easy';
                                                } else if ($value->question_mode == 2) {
                                                    echo 'Easy';
                                                } else if ($value->question_mode == 3) {
                                                    echo 'Medium';
                                                } else if ($value->question_mode == 4) {
                                                    echo 'Hard';
                                                } else if ($value->question_mode == 5) {
                                                    echo 'Very Hard';
                                                } ?></b>

                                        </div>
                                        <div class="panel-collapse online-test-options">
                                            <div class="panel-body">
                                                <div class="col-sm-8">

                                                    <div class="col-lg-12 question">
                                                        <div class="input-group">

                                                            <?php
                                                            if ($value->question != '') {

                                                                echo '<h4>';
                                                                echo $value->question;
                                                                echo '</h4>';

                                                            }


                                                            if ($value->question_code != '') {

                                                                echo '<pre><code class="language-markup">';
                                                                echo $value->question_code;
                                                                echo '</code></pre>';
                                                            }


                                                            if ($value->question_img != '') {

                                                                echo '<img class="img-responsive" src="' . base_url() . $value->question_img . '" style="width: 35%;">';

                                                            } ?>

                                                            <?php

                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    if ($value->answer_type == 1) {

                                                        ?>
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <?= $value->op1 ?>

                                                                <?php
                                                                if ($value->answer == 'op1') {
                                                                    echo '<img class="valid_img" id="right1_4" src="https://www.fresherslive.com/image/right_icon.png" style="display: inline-block;">';
                                                                }
                                                                ?>


                                                            </div><!-- /input-group -->
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <?= $value->op2 ?>
                                                                <?php
                                                                if ($value->answer == 'op2') {
                                                                    echo '<img class="valid_img" id="right1_4" src="https://www.fresherslive.com/image/right_icon.png" style="display: inline-block;">';
                                                                }
                                                                ?>
                                                            </div><!-- /input-group -->
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <?= $value->op3 ?>
                                                                <?php
                                                                if ($value->answer == 'op3') {
                                                                    echo '<img class="valid_img" id="right1_4" src="https://www.fresherslive.com/image/right_icon.png" style="display: inline-block;">';
                                                                }
                                                                ?>
                                                            </div><!-- /input-group -->
                                                        </div>


                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <?= $value->op4 ?>
                                                                <?php
                                                                if ($value->answer == 'op4') {
                                                                    echo '<img class="valid_img" id="right1_4" src="https://www.fresherslive.com/image/right_icon.png" style="display: inline-block;">';
                                                                }
                                                                ?>
                                                            </div><!-- /input-group -->
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <b> Candidate Answer</b> :

                                                                <?php
                                                                if ($value->candidate_answer == '') {
                                                                    echo 'Unanswered';
                                                                } else {
                                                                    echo $value->candidate_answer;
                                                                    echo "&nbsp;";
                                                                    if (strtolower(trim($value->answer)) == strtolower(trim($value->candidate_answer))) {
                                                                        echo '<img class="valid_img" id="right1_4" src="https://www.fresherslive.com/image/right_icon.png" style="display: inline-block;">';
                                                                    } else {
                                                                        echo '<img class="valid_img" id="right1_4" src="https://www.fresherslive.com/image/wrong_icon.png" style="display: inline-block;">';
                                                                    }
                                                                } ?>
                                                            </div><!-- /input-group -->
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><b>Solution</b></p>
                                                    <?= nl2br($value->q_solution) ?>
                                                    <br>
                                                    <b>Right Answer</b> : <b><?php echo $value->answer; ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                } ?>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </dl>
        </div><!-- /.box-body -->
    </div>
</div>

<div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
</div>