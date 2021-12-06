window.addEventListener('load', function () {
  const confirmDeleteSubImgBtnList = document.querySelectorAll('.js-delete-sub-img-btn');

  confirmDeleteSubImgBtnList.forEach(btn => {
    btn.addEventListener('click', function () {
      let subImgFormGroup = this.parentElement.parentElement;
      let inputDeleteSubImgList = subImgFormGroup.querySelectorAll('.js-delete-sub-img');

      inputDeleteSubImgList.forEach(input => {
        if (input.checked) {
          let imgGroup = input.parentElement;
          let imgGroupContainer = imgGroup.parentElement;

          imgGroupContainer.removeChild(imgGroup);
        }
      });
    })
  });

})