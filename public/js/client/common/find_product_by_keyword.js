window.addEventListener('load', function () {
  // set sessionStorage for key word
  const searchProductInput = document.querySelector('.js-search-product-input');
  searchProductInput.addEventListener('change', function () {
    sessionStorage.setItem('keyWord', this.value);
    sessionStorage.setItem('pageNum', 1);

    if (sessionStorage.getItem('pageName') != 'product') {
      location.href = './index.php?page=product';
    }
  })
})