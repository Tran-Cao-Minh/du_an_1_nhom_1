<!-- bread-crumb -->
<section class="bread-crumb">
  <div class="bread-crumb__container">
    <a class="bread-crumb__link" href="<?php echo $main_bread_crumb_link; ?>">
      <?php echo $main_bread_crumb; ?>
    </a>
    <?php if ($sub_bread_crumb != ''): ?>
      <div class="bread-crumb__contain-icon">
        <i class="fas fa-chevron-right bread-crumb__icon"></i>
      </div>
      <a class="bread-crumb__link" href="<?php echo $sub_bread_crumb_link; ?>">
        <?php echo $sub_bread_crumb; ?>
      </a>
    <?php endif; ?>
  </div>
</section>
<!-- bread-crumb -->