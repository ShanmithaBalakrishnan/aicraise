$(document).ready(function () {


  $("#wf-form-scheduleVisit").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "assets/php/send-mail.php",
      type: "GET",
      data: formData,
      processData: false,
      contentType: false,
      success: function (status) {
        $("#enq-name").val("");
        $("#enq-email").val("");
        $("#enq-phone").val("");
        $("#datepicker").val("");
        $("#locationInterest").val("");
        $("#Membership-Type").val("");
        $("#Source-of-Lead").val("");
        $("#w-form-done").show();
        $("#alert").append(`<div class="alert">Application Submitted Successfully!</div>`);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        $("#w-form-done").hide();
        $("#w-form-fail").show();
        alert(errorThrown);
      }
    });
  });
});
