window.addEventListener('load', function () {
  const inputImg = document.querySelector('.js-img-input');

  inputImg.addEventListener('change', function (e) {
    const notification = document.querySelector('.js-img-notification');

    const imgFile = e.target.files[0];

    const fileReader = new FileReader();
    fileReader.readAsDataURL(imgFile);

    fileReader.onload = function () {
      const previewImgElement = document.querySelector('.js-preview-img');
      const imgUrl = fileReader.result;
      previewImgElement.src = imgUrl;
      previewImgElement.style.zIndex = 0;

      if (imgFile['size'] > 2097152) {
        notification.innerHTML = 'Vui lòng chọn ảnh có kích thước nhỏ hơn 2MB';

      } else {
        notification.innerHTML = '';
      }
    }
  })
})
