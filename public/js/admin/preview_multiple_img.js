window.addEventListener('load', function () {
  const inputMultipleImgList = document.querySelectorAll('.js-multiple-img-input');

  inputMultipleImgList.forEach(input => {
    input.addEventListener('change', function (e) {
      let inputMultipleImgFormGroup = this.parentElement;
      let previewImgContainer = inputMultipleImgFormGroup.querySelector('.js-multiple-img-container');
      previewImgContainer.innerHTML = '';

      let imgFileList = e.target.files;
      let notification = inputMultipleImgFormGroup.querySelector('.js-preview-multiple-img-notification');

      notification.innerHTML = '';

      for (i = 0; i < imgFileList.length; i++) {
        let reader = new FileReader();
        reader.readAsDataURL(imgFileList[i]);

        reader.onload = function () {
          let imgUrl = reader.result;
          previewImgContainer.innerHTML += `
              <div class="interaction-form__contain-sub-img">
                <img class="interaction-form__sub-img" src="${imgUrl}">
              </div>
            `;
        }

        if (imgFileList[i]['size'] > 2097152) {
          notification.innerHTML = 'Vui lòng chọn ảnh có kích thước nhỏ hơn 2MB'
        }
      }
    })
  });
})