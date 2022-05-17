// Form Wizard / Stepper

var linearStepper = document.querySelector("#linearStepper");
var linearStepperInstace = new MStepper(linearStepper, {
  firstActive: 0,
  showFeedbackPreloader: true,
  // Auto generation of a form around the stepper.
  autoFormCreation: true,
  // Function to be called everytime a nextstep occurs. It receives 2 arguments, in this sequece: stepperForm, activeStepContent.
  // validationFunction: defaultValidationFunction, // more about this default functions below
  validationFunction: validationFunction, // more about this default functions below
  // Enable or disable navigation by clicking on step-titles
  stepTitleNavigation: true,
  feedbackPreloader: '<div class="spinner-layer spinner-blue-only">...</div>',
});

linearStepperInstace.resetStepper();
// linearStepperInstace.openStep(3);

// var horizStepper = document.querySelector('#horizStepper');
// var horizStepperInstace = new MStepper(horizStepper, {
//     // options
//     firstActive: 0,
//     showFeedbackPreloader: true,
//     autoFormCreation: true,
//     // validationFunction: defaultValidationFunction,
//     stepTitleNavigation: true,
//     feedbackPreloader: '<div class="spinner-layer spinner-blue-only">...</div>'
// });

// horizStepperInstace.resetStepper();

// var nonLinearStepper = document.querySelector('#nonLinearStepper');
// var nonLinearStepperInstace = new MStepper(nonLinearStepper, {
//     // options
//     firstActive: 0,
//     showFeedbackPreloader: true,
//     autoFormCreation: true,
//     validationFunction: defaultValidationFunction,
//     stepTitleNavigation: true,
//     feedbackPreloader: '<div class="spinner-layer spinner-blue-only">...</div>'
// });

function validationFunction(stepperForm, activeStepContent) {
  // You can use the 'stepperForm' to valide the whole form around the stepper:
  // someValidationPlugin(stepperForm);
  console.log(activeStepContent);
  // console.log(activeStepContent);
  $(".error").remove();
  $(".stepper").getStep($(".stepper").getActiveStep()).removeClass("wrong");

  var activeStep = $(".stepper").getActiveStep();

  // if($(activeStepContent).find('.step-content').data('step') == '1'){
  // }

  if (activeStep == 1) {
    if ($(activeStepContent).find("#pname").val() == "") {
      $("#pname").after('<span class="error">This field is required</span>');
      return false;
    } else if ($(activeStepContent).find("#pdescription").val() == "") {
      $("#pdescription").after(
        '<span class="error">This field is required</span>'
      );
      return false;
    } else if ($(activeStepContent).find("#psdescription").val() == "") {
      $("#psdescription").after(
        '<span class="error">This field is required</span>'
      );
      return false;
    } else if ($(activeStepContent).find("#psku").val() == "") {
      $("#psku").after('<span class="error">This field is required</span>');
      return false;
    } else if ($(activeStepContent).find("#pweight").val() == "") {
      $("#pweight").after('<span class="error">This field is required</span>');
      return false;
    } else if ($(activeStepContent).find("#psize").val() == "") {
      $("#psize").after('<span class="error">This field is required</span>');
      return false;
    } else if (
      $(activeStepContent).find("#pstatus option:selected").val() == ""
    ) {
      $("#pstatus").after('<span class="error">This field is required</span>');
      return false;
    } else {
      return true;
    }
  } else if (activeStep == 2) {
    if ($(activeStepContent).find("#pcategory").val() == "") {
      $("#pcategory").after(
        '<span class="error">This field is required</span>'
      );
      return false;
    } else {
      return true;
    }
  } else if (activeStep == 3) {
    var url_last = window.location.pathname.split("/").pop();

    if (
      !parseInt(url_last) &&
      document.getElementById("pimages").files.length == 0
    ) {
      $("#pimageserror").html(
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="error">This field is required</span>'
      );
    } else {
      return true;
    }
  } else {
    return true;
  }
  // console.log(jnk.val());
  // Or you can do something with just the activeStepContent
  //someValidationPlugin(activeStepContent);
  // Return true or false to proceed or show an error
  // return true;
}

// function defaultValidationFunction(stepperForm, activeStepContent) {
//     var inputs = activeStepContent.querySelectorAll('input, textarea, select');
//     for (var i = 0; i < inputs.length; i++) {
//         if (!inputs[i].checkValidity()) return false;
//     }
//     return true;
// }

$.fn.getActiveStep = function () {
  var active = this.find(".step.active");
  return $(this.children(".step:visible")).index($(active)) + 1;
};

$.fn.getStep = function (step) {
  var settings = $(this).closest("ul.stepper").data("settings");
  var $this = this;
  var step_num = step - 1;
  step = this.find(".step:visible:eq(" + step_num + ")");
  return step;
};

$(".btn-reset").on("click", function () {
  // horizStepperInstace.openStep(0);
  linearStepperInstace.openStep(0);
  // nonLinearStepperInstace.openStep(0);
});
