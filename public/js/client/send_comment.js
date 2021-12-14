$(document).ready(function () {
  $('.prod__detail-comment-form-icon').on('click', function () {
    let commentContent = $('.js-comment-input').val();
    let commentProductId = $('.js-comment-product-id').val();
    let commentMessage = $('.js-comment-message');
    if (commentContent === '') {
      commentMessage.html('Bạn chưa nhập bình luận!');
    } else {
      $.ajax({
        url: '../ajax/ajax_post_comment.php',
        type: 'GET',
        dataType: 'html',
        data: {
          commentContent: commentContent,
          commentProductId: commentProductId,
        }
      }).done(function (output) {
        if (output === "not login") {
          commentMessage.html('Vui lòng đăng nhập để gửi bình luận !');
        } else if (output === "fail") {
          commentMessage.html('Có lỗi xảy ra khi đăng bình luận !');
        } else if (output === "wrong password or id") {
          commentMessage.html('Bạn vui lòng đăng nhập lại để gửi bình luận !');
        } else {
          $('.js-comment-input').val('');
          $('.prod__detail-comment-content').prepend(output);
        }
      })
    }
  })
})