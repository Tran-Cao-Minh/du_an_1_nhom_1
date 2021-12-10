$(document).ready(function () {
    $('.prod__detail-comment-form-icon').on('click', function () {
        let commentContent = $('.js-comment-input').val();
        if (commentContent === '') {
            alert("Bạn chưa nhập bình luận!");
        } else {
            let commentButton = $('.prod__detail-comment-form-icon');
            // let productId = commentButton.data('PkProduct_Id');

            $.ajax({
                url: '../ajax/ajax_post_comment.php',
                type: 'GET',
                dataType: 'html',
                data: {
                    commentContent: commentContent,
                    // productId: productId,
                }
            }).done(function (output) {
                if (output === "fail") {
                    alert("Có lỗi xảy ra!");
                } else {
                    $('.js-comment-input').val('');
                    $('.prod__detail-comment-content').prepend(output);
                }
            })
        }
    })
})