$(document).ready(function () {
  $('.js-pay-btn').click(function () {

    $.ajax({
      url: '../ajax/ajax_pay_check.php',
      type: 'POST',
      dataType: 'html',
      data: {
          
      }
    }).done(function (data) {
      console.log(data);
    })
  })

})