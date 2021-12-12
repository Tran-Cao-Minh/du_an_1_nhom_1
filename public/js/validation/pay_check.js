$(document).ready(function () {
  $('.js-pay-btn').click(function () {
    console.log(123);
    $.ajax({
      url: '../ajax/ajax_pay_check.php',
      type: 'POST',
      dataType: 'html',
      
    }).done(function (data) {
      console.log(data);
      if (data === "ok") {
        alert("lồn");
      } else {
        alert("cặc");
      }
    })
  })

})