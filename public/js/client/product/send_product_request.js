window.addEventListener('load', function () {
  function getProductListData () {
    // alert(sessionStorage.getItem("SessionName"));
  }


  function clearFilterSessionData () {
    sessionStorage.setItem('orderRule', 'newest');
    sessionStorage.setItem('priceRange', 'allPrice');
    sessionStorage.setItem('brandList', JSON.stringify([]));
    sessionStorage.setItem('colorList', JSON.stringify([]));
    sessionStorage.setItem('sizeList', JSON.stringify([]));
    sessionStorage.setItem('pageNum', 1);
  }

  // get product list data when first time go to product page
  clearFilterSessionData();
  getProductListData();

  // set sessionStorage for category
  const categoryInputList = document.querySelectorAll('.js-category-input');
  categoryInputList.forEach(input => {
    input.addEventListener('change', function () {
      let categoryList = JSON.parse(sessionStorage.getItem('categoryList'));
      let inputValue = this.dataset.filterValue;

      if (input.checked == true) {
        categoryList.push(inputValue);
      } else if (input.checked == false) {
        let index = categoryList.indexOf(inputValue);
        categoryList.splice(index, 1);
      }

      sessionStorage.setItem('categoryList', JSON.stringify(categoryList));
      sessionStorage.setItem('pageNum', 1);
      getProductListData();
    })
  });

  // clear filter session
  const deleteFilterBtnList = document.querySelectorAll('.js-delete-filter-btn');
  deleteFilterBtnList.forEach(btn => {
    btn.addEventListener('click', clearFilterSessionData);
  });

  // set sessionStorage for sort rule
  const orderInputList = document.querySelectorAll('.js-order-input');
  orderInputList.forEach(input => {
    input.addEventListener('change', function () {
      if (input.checked == true) {
        sessionStorage.setItem('orderRule', this.id);
        sessionStorage.setItem('pageNum', 1);
        getProductListData();
      }
    })
  });

  // set sessionStorage for price range
  const priceRangeInputList = document.querySelectorAll('.js-price-range-input');
  priceRangeInputList.forEach(input => {
    input.addEventListener('change', function () {
      if (input.checked == true) {
        sessionStorage.setItem('priceRange', this.id);
        sessionStorage.setItem('pageNum', 1);
        getProductListData();
      }
    })
  });

  // set sessionStorage for brand
  const brandInputList = document.querySelectorAll('.js-brand-input');
  brandInputList.forEach(input => {
    input.addEventListener('change', function () {
      let brandList = JSON.parse(sessionStorage.getItem('brandList'));
      let inputValue = this.dataset.filterValue;

      if (input.checked == true) {
        brandList.push(inputValue);
      } else if (input.checked == false) {
        let index = brandList.indexOf(inputValue);
        brandList.splice(index, 1);
      }

      sessionStorage.setItem('brandList', JSON.stringify(brandList));
      sessionStorage.setItem('pageNum', 1);
      getProductListData();
    })
  });

  // set sessionStorage for color
  const colorInputList = document.querySelectorAll('.js-color-input');
  colorInputList.forEach(input => {
    input.addEventListener('change', function () {
      let colorList = JSON.parse(sessionStorage.getItem('colorList'));
      let inputValue = this.dataset.filterValue;

      if (input.checked == true) {
        colorList.push(inputValue);
      } else if (input.checked == false) {
        let index = colorList.indexOf(inputValue);
        colorList.splice(index, 1);
      }

      sessionStorage.setItem('colorList', JSON.stringify(colorList));
      sessionStorage.setItem('pageNum', 1);
      getProductListData();
    })
  });

  // set sessionStorage for size
  const sizeInputList = document.querySelectorAll('.js-size-input');
  sizeInputList.forEach(input => {
    input.addEventListener('change', function () {
      let sizeList = JSON.parse(sessionStorage.getItem('sizeList'));
      let inputValue = this.dataset.filterValue;

      if (input.checked == true) {
        sizeList.push(inputValue);
      } else if (input.checked == false) {
        let index = sizeList.indexOf(inputValue);
        sizeList.splice(index, 1);
      }

      sessionStorage.setItem('sizeList', JSON.stringify(sizeList));
      sessionStorage.setItem('pageNum', 1);
      getProductListData();
    })
  });
})