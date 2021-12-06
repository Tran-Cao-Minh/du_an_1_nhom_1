window.addEventListener('load', function () {
  const openVariantBtnList = document.querySelectorAll('.js-open-variant-form');
  const variantFormList = document.querySelectorAll('.js-variant-form');
  const inputCollapseProductForm = document.querySelector('#interaction-form__collapse-product-form');

  openVariantBtnList.forEach(btn => {
    btn.addEventListener('click', function () {
      let dataColorId = this.dataset.colorId;

      variantFormList.forEach(form => {
        if (form.dataset.colorId == dataColorId) {
          form.style.maxHeight = '1000rem';

        } else {
          form.style.maxHeight = '0rem';
        }
      });

      inputCollapseProductForm.checked = true;
    })
  });

  const collapseVariantFormBtnList = document.querySelectorAll('.js-collapse-all-variant-form');
  collapseVariantFormBtnList.forEach(btn => {
    btn.addEventListener('click', function () {
      variantFormList.forEach(form => {
        form.style.maxHeight = '0rem';
      });
    })
  });
})