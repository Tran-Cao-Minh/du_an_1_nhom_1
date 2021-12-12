$(document).ready(function () {
  $('.js-change-new-email-btn').on('click', function () {
      let changeEmailValue = $('.js-new-email-input').val();
      
          $.ajax({
              url: '../ajax/ajax_change_email.php',
              type: 'POST',
              dataType: 'html',
              data: {
                  changeEmailValue: changeEmailValue,
              }
          }).done(function (output) {
            console.log(output);
          })
  })
})