window.addEventListener('load', function () {
  const inputImgList = document.querySelectorAll('.js-img-input');

  inputImgList.forEach(input => {
    input.addEventListener('change', function (e) {
      let inputImgFormGroup = this.parentElement;
      let notification = inputImgFormGroup.querySelector('.js-img-notification');
  
      let imgFile = e.target.files[0];
  
      let fileReader = new FileReader();
      fileReader.readAsDataURL(imgFile);
  
      fileReader.onload = function () {
        let previewImgElement = inputImgFormGroup.querySelector('.js-preview-img');
        let imgUrl = fileReader.result;
        previewImgElement.src = imgUrl;
        previewImgElement.style.zIndex = 1;
  
        if (imgFile['size'] > 2097152) {
          notification.innerHTML = 'Vui lòng chọn ảnh có kích thước nhỏ hơn 2MB';
  
        } else {
          notification.innerHTML = '';
        }
      }
    })
    
  });
})
