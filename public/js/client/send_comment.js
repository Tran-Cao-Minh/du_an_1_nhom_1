$(document).ready(function () {
    $('.prod__detail-comment-form-icon').on('click', function () {
        let commentContent = $('.js-comment-input').val();
        if (commentContent === '') {
            alert("Bạn chưa nhập bình luận!");
        } else {
            $.ajax({
                url: './model/m_post_comment.php',
                type: 'GET',
                dataType: 'html',
                data: {
                    commentContent: commentContent,
                }
            }).done(function (output) {
                console.log(output);
            })
        }
    })
})