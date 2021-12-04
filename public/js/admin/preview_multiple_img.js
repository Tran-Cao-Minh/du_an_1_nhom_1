window.addEventListener('load', function () {
  const inputMultipleImg = document.querySelector('.js-multiple-img-input');

  inputMultipleImg.addEventListener('change', function (e) {
    const previewImgContainer = document.querySelector('.js-multiple-img-container');
    previewImgContainer.innerHTML = '';
    
    const imgFileList = e.target.files;
    const notification = document.querySelector('.js-preview-multiple-img-notification');

    if (imgFileList.length < 4 || imgFileList.length > 10) {
      notification.innerHTML = 'Bạn vui lòng chọn 4 đến 10 ảnh';

    } else {
      notification.innerHTML = '';

      for (i = 0; i < imgFileList.length; i++) {
        let reader = new FileReader();
        reader.readAsDataURL(imgFileList[i]);

        reader.onload = function () {
          const imgUrl = reader.result;
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
    }
  })
})
