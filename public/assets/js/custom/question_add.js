// if(window.location.href.indexOf("update-product") > -1) {
//     var cpage = 'update-product', pid = $('#product_id').val();
// }else{
//     var cpage = 'add-product', pid = '';
// }

$("#addQuestionValidate").submit(function (e) {
  var q_name = $("#q_name").val();
  var q_code = $("#q_code").val();
  var fileName = $("#q_image").val();

  // console.log(q_name);
  // console.log(q_code);
  // console.log(fileName);

  if (!q_name && !q_code && !fileName) {
    e.preventDefault();

    swal({
      title: "Please Write Question or Code or Upload Image",
      icon: "error",
      closeOnClickOutside: false,
    });
    return false;
  }
});

// $('#div-options').hide();
// $('#div-write').hide();

$('input[type="radio"]').click(function () {
  var inputValue = $(this).attr("value");
  if (inputValue == 1) {
    $("#div-options .q-option").removeAttr("disabled");
    $("#div-write .q-option").attr("disabled", "disabled");

    $("#div-write").hide();
    $("#div-options").show();
  } else {
    $("#div-options .q-option").attr("disabled", "disabled");
    $("#div-write .q-option").removeAttr("disabled");
    $("#div-options").hide();
    $("#div-write").show();
  }
});

function showAlert() {
  swal({
    title: "Please Wait!",
    closeOnClickOutside: false,
    closeOnEsc: false,
    text: "action perform",
    icon: base_url_cloudfront + "loading-icon.gif",
    buttons: false,
  });
}
