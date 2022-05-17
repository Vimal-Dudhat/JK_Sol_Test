function Countdown(options) {
    var timer,
        instance = this,
        seconds = options.seconds || 10,
        updateStatus = options.onUpdateStatus || function () {
            },
        counterEnd = options.onCounterEnd || function () {
            };

    function decrementCounter() {
        updateStatus(seconds);
        if (seconds === 0) {
            counterEnd();
            instance.stop();
        }
        seconds--;
    }

    this.start = function () {
        clearInterval(timer);
        timer = 0;
        seconds = options.seconds;
        timer = setInterval(decrementCounter, 1000);
    };

    this.stop = function () {
        clearInterval(timer);
    };
}


function secondsToHms(secs) {
    var hours = Math.floor(secs / (60 * 60));

    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);

    var divisor_for_seconds = divisor_for_minutes % 60;
    var seconds = Math.ceil(divisor_for_seconds);

    if (minutes.toString().length == 1) {
        minutes = '0' + minutes;
    }

    if (seconds.toString().length == 1) {
        seconds = '0' + seconds;
    }

    if (hours > 0) {

        if (hours.toString().length == 1) {
            hours = '0' + hours;
        }

        return hours + ':' + minutes + ':' + seconds;

    } else {

        return minutes + ':' + seconds;

    }

}


function write_answer(elmnt, que_id, id) {

    var a = $(elmnt).val().trim();
    update_answer(a, que_id, id, 2);

    if (!$("#question" + que_id).hasClass("checkedquestion")) {

        document.getElementById("question" + que_id).className += " checkedquestion";
    }

    if (a == '') {
        $("#question" + que_id).removeClass("checkedquestion")
    }

}


function update_answer(a, q, ai, t) {
    $.ajax({
        url: base_url + "update-answer",
        method: "POST",
        data: {a: a, q: q, ai: ai, t: t}
    }).done(function () {

    });
}


$(document).ready(function(){

    manage_pre_next();
});


$('body').on("click", '#btn_start_test', function (e) {
    $('#btn_start_test').hide();
    $('.div_start_test').hide();

    $.ajax({
        url: base_url + "start-test",
        method: "POST"
    }).done(function () {

        $('nav').show();
        $('#aptitude_test').show();
        myCounter.start();

    });
});


$('body').on("click", '.answerImage4', function (e) {

    var qid = $(this).parent().data('id');
    var optionId = $(this).data('id');
    var ai = $(this).parent().data('ai');

    $('.answer'+qid).removeClass('answerOverlayBlue');
    $(this).addClass('answerOverlayBlue');

    if (!$("#question" + qid).hasClass("checkedquestion")) {

        document.getElementById("question" + qid).className += " checkedquestion";
    }

    update_answer(optionId, qid, ai, 1);
});


$('body').on("click", 'li.tab a', function (e) {

    if( $(this).data('id') == 1){

        $(".btn_next").show();
        $(".btn_finish").hide();
        $(".btn_next").attr("disabled", false);
        $(".btn_pre").attr("disabled",true );

    }else if( $('#tq').val() == $(this).data('id')){

        $('.btn_pre').attr("disabled", false);
        $(".btn_next").hide();
        $(".btn_finish").show();

    }else{

        $(".btn_next").show();
        $(".btn_finish").hide();
        $('.btn_pre').attr("disabled", false);
        $(".btn_next").attr("disabled", false);
    }
});


$('body').on("click", '.end-test', function (e) {

    $.ajax({
        url: base_url + "questions-left",
        method: "POST"
    }).done(function (data) {

        console.log(data);
        if (data > 0) {

            var title = "Total number of unanswered questions = " + (data);
        } else {
            var title = ''
        }

        swal({
            title: title,
            text: "Are you sure you want to finish the test now?",
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: 'No, Please!',
                delete: 'Yes, Finish It'
            }
        }).then(function (willDelete) {
            if (willDelete) {
                $('form').submit();
            }
        });
    });
});


function disableSelection(target) {
    $(function () {
        $(this).bind("contextmenu", function (e) {
            e.preventDefault();
        });
    });
    if (typeof target.onselectstart != "undefined") //For IE
        target.onselectstart = function () {
            return false
        }
    else if (typeof target.style.MozUserSelect != "undefined") //For Firefox
        target.style.MozUserSelect = "none"
    else //All other route (For Opera)
        target.onmousedown = function () {
            return false
        }
    target.style.cursor = "default";
}


$(document).ready(function () {
    disableSelection(document.body);
});





$(document).keydown(function (event) {
    if (event.keyCode == 123) {
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
        return false;
    }
});


$(window).on('keydown', function (event) {
    if (event.keyCode == 123) {
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
        return false;  //Prevent from ctrl+shift+i
    }
    else if (event.ctrlKey && event.keyCode == 73) {
        return false;  //Prevent from ctrl+shift+i
    }
});


$(document).bind('keydown', function (e) {
    if (e.ctrlKey && (e.which == 83)) {
        e.preventDefault();
        return false;
    }
});



$('body').on("click", '.btn_next', function (e) {

    e.preventDefault();
    var elem = document.querySelector('.tabs');
    var options= {};
    instance = M.Tabs.init(elem, options);

    var nextSection = 'section'+parseInt(instance.index+2);
    instance.select(nextSection);

    manage_pre_next();
});


$('body').on("click", '.btn_pre', function (e) {

    e.preventDefault();
    var elem = document.querySelector('.tabs');
    var options= {};
    instance = M.Tabs.init(elem, options);

    var nextSection = 'section'+parseInt(instance.index);
    instance.select(nextSection);

    manage_pre_next();
});


function manage_pre_next() {

    var item1 = $( "ul.tabs li.tab a.active" );
    if(item1[0]){

        if( item1[0].dataset.id == 1){

            $(".btn_next").attr("disabled", false);
            $(".btn_pre").attr("disabled",true );

        }else if( $('#tq').val() == item1[0].dataset.id){

            $('.btn_pre').attr("disabled", false);
            $(".btn_next").attr("disabled", true);

        }else{

            $('.btn_pre').attr("disabled", false);
            $(".btn_next").attr("disabled", false);
        }
    }
}

