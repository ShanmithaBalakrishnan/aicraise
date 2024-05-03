$(document).ready(function () {


  $("#wf-form-ContactForm").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "assets/php/send-mailc.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (status) {
        $("#success-text-1").show();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        $("#success-text-1").hide();
        $("#error-text-1").show();
        alert(errorThrown);
      }
    });
  });
});
