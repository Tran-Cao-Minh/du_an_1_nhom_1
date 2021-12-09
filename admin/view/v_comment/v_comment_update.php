<section class="interaction-form">
  <form>
    <div class="interaction-form__title--update">
      Sửa bình luận
    </div>
    <?php if ($object_data != ''): ?>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Sản phẩm được bình luận
        </div>
        <input type="text" class="interaction-form__input--read-only"
          readonly
          value="<?php echo $object_data['ProductName']; ?>"
        >
      </div>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Người bình luận
        </div>
        <input type="text" class="interaction-form__input--read-only"
          readonly
          value="<?php echo $object_data['CustomerName']; ?>"
        >
      </div>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Ngày đăng
        </div>
        <input type="date" class="interaction-form__input--read-only"
          readonly
          value="<?php echo $object_data['CommentDate']; ?>"
        >
      </div>
      <div class="interaction-form__form-group">
        <label for="comment_content" class="interaction-form__form-title">
          Nội dung bình luận
        </label>
        <textarea class="interaction-form__input paragraph" col="2"
          name="comment_content" id="comment_content"
          maxlength="800"
        ><?php echo $object_data['CommentContent']; ?></textarea>
      </div>
      <div class="interaction-form__action-group">
        <input type="hidden" name="object_id" value="<?php echo $object_id; ?>">
        <button type="submit" class="interaction-form__submit-btn--update"
          name="update_confirm" value="true">
          Xác nhận sửa
        </button>
        <a href="?view_name=overview" class="interaction-form__return-link">
          Quay lại
        </a>
      </div>
    <?php endif; ?>
  </form>
</section>

<section class="notification">
  <span class="notification__title">Thông báo: </span>
  <span class="notification__content">
    <?php echo $notification; ?>
  </span>
</section>