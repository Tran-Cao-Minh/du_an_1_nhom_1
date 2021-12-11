window.addEventListener('load', function () {
  function getProductListData() {
    if (sessionStorage.getItem('keyWord') == null) {
      sessionStorage.setItem('keyWord', '');
    }
    if (sessionStorage.getItem('keyWord') != '') {
      $('.js-product-keyword').text(
        `Sản phẩm - Từ khóa: ${sessionStorage.getItem('keyWord')}`
      );
    } else {
      $('.js-product-keyword').text('Sản phẩm');
    }
    $.ajax({
      url: '../../../../../du_an_1_nhom_1/ajax/ajax_product.php',
      type: 'GET',
      dataType: 'html',
      data: {
        order_rule: sessionStorage.getItem('orderRule'),
        price_range: sessionStorage.getItem('priceRange'),
        brand_list: sessionStorage.getItem('brandList'),
        category_list: sessionStorage.getItem('categoryList'),
        color_list: sessionStorage.getItem('colorList'),
        size_list: sessionStorage.getItem('sizeList'),
        page_num: sessionStorage.getItem('pageNum'),
        key_word: sessionStorage.getItem('keyWord')
      }
    }).done(function (output) {
      $('.js-product-container').empty();
      $('.js-product-container').append(output);

      let btnChangePageNumList = $('.js-change-product-page');
      btnChangePageNumList.each(function () {
        $(this).click(function () {
          sessionStorage.setItem('pageNum', this.dataset.pageNum);
          getProductListData();
        })
      })

      let btnBuyProductList = $('.js-buy-prod-btn');
      btnBuyProductList.each(function () {
        $(this).click(function () {
          $('.overlay-5').addClass("overlay--active-5");
          let dataProductId = $(this).data('productId');
          $.ajax({
            url: '../../../../../du_an_1_nhom_1/ajax/ajax_buy_product_form.php',
            type: 'GET',
            dataType: 'html',
            data: {
              product_id: dataProductId,
            }
          }).done(function (output) {
            $('.js-buy-product-form-variant').empty();
            $('.js-buy-product-form-variant').append(output);
            document.querySelector('.js-buy-product-form-add').dataset.productId = dataProductId;
            document.querySelector('.js-get-product-variant-color').click();
            document.querySelector('.js-buy-product-form-notification').innerHTML = '';
          })
        })
      })
    })
  }

  function clearFilterSessionData() {
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

  // set sessionStorage for key word
  const searchProductInputFilter = document.querySelector('.js-search-product-input');
  searchProductInputFilter.addEventListener('change', function () {
    sessionStorage.setItem('keyWord', this.value);
    sessionStorage.setItem('pageNum', 1);

    getProductListData();
  })

  // set sessionStorage for category
  const categoryInputList = document.querySelectorAll('.js-category-input');
  categoryInputList.forEach(input => {
    input.addEventListener('change', function () {
      // categoryList sessionStorage it set from v_product.php
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
  const priceRangeLabelFilter = document.querySelector('.js-price-range-label');
  priceRangeLabelFilter.addEventListener('click', function () {
    sessionStorage.setItem('priceRange', 'allPrice');
    getProductListData();
  })

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

  // delete filter
  const deleteSessionFilterBtnList = document.querySelectorAll('.js-delete-filter-btn');
  deleteSessionFilterBtnList.forEach(btn => {
    btn.addEventListener('click', function () {
      sessionStorage.setItem('keyWord', '');
      clearFilterSessionData();
      getProductListData();
    })
  });
})