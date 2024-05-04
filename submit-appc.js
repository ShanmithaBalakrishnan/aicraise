/*
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
*/

document
  .querySelector("#wf-form-ContactForm")
  .addEventListener("submit", handleSubmit);

const submitSuccess = document.querySelector('#success-text-1')
const submitError = document.querySelector('#error-text-1')

const handleSubmit = (e) => {
  e.preventDefault();
  let myForm = document.getElementById("#wf-form-ContactForm");
  let formData = new FormData(this);
  fetch("/", {
    method: "GET",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams(formData).toString(),
  })
    
    .then(() => { submitSuccess.setAttribute('data-submit', success); })
    .catch((error) => { submitError.setAttribute('data-submit', error) });
};