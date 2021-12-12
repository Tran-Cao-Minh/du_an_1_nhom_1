window.addEventListener('load', function () {
  const chooseColorProductForm = document.querySelector('.js-buy-product-form-variant');
  const chooseSizeProductForm = document.querySelector('.js-buy-product-form-size');
  chooseColorProductForm.addEventListener('click', function () {
    let inputColorList = document.querySelectorAll('.js-get-product-variant-color');
    inputColorList.forEach(input => {
      if (input.checked == true) {
        chooseSizeProductForm.innerHTML = '';
        let dataSizeList = input.dataset.size.split(" ");
        let dataQuantityList = input.dataset.quantity.split(" ");
        let index = 0;
        dataSizeList.forEach(size => {
          if (dataQuantityList[index] > 0) {
            chooseSizeProductForm.innerHTML += `
              <label class="product__filter-item">
                <input type="radio" id="buy_product_form_${size}"
                  class="js-get-product-variant-size"
                  name="product_variant_size_in_buy_product_form"
                  data-quantity="${dataQuantityList[index]}"
                  data-size="${size}"
                >
                <label class="product__filter-label-size" for="buy_product_form_${size}">
                  <span class="prodduct__size-name">
                    ${size}
                  </span>
                </label>
              </label>
            `;
          } else {
            chooseSizeProductForm.innerHTML += `
              <div class="product__filter-item product__filter-label--disabled">
                <div class="product__filter-label-size">
                  <span class="prodduct__size-name">
                    ${size}
                  </span>
                </div>
              </div>
            `;
          }
          index++;
        });
      }
    });
  })

  const addProductToBasketBtn = document.querySelector('.js-buy-product-form-add');
  addProductToBasketBtn.addEventListener('click', function () {
    let checkChooseProductSize = false;
    let productVariantSize = '';
    let inputSizeList = document.querySelectorAll('.js-get-product-variant-size');
    inputSizeList.forEach(input => {
      if (input.checked == true) {
        checkChooseProductSize = true;
        productVariantSize = input.dataset.size;
        let productVariantQuantity = input.dataset.quantity;
        let productVariantColor = '';
        let productVariantImg = '';
        let productVariantName = '';
        let productVariantPrice = '';

        let inputColorList = document.querySelectorAll('.js-get-product-variant-color');
        inputColorList.forEach(input => {
          if (input.checked == true) {
            productVariantColor = input.dataset.colorId;
            productVariantImg = input.dataset.image;
            productVariantName = input.dataset.name;
            productVariantPrice = input.dataset.price;
          }
        });
        
        let productId = this.dataset.productId;

        let productObject = {
          'id': productId,
          'color': productVariantColor,
          'name': productVariantName,
          'image': productVariantImg,
          'price': productVariantPrice,
          'size': productVariantSize,
          'quantity': 1
        };

        let containtBuyProductForm = document.querySelector('.overlay-5');
        if (localStorage.getItem('productInCart') !== null) {
          productInCart = JSON.parse(localStorage.getItem('productInCart'));
          let checkProductInCart = false;
          productInCart.forEach(product => {
            if (
              product.id == productId &&
              product.color == productVariantColor &&
              product.size == productVariantSize
            ) {
              checkProductInCart = true;
              if ((product.quantity + 1) > productVariantQuantity) {
                let buyProductFormNotification = document.querySelector('.js-buy-product-form-notification');
                buyProductFormNotification.innerHTML = `
                  Không thế thêm sản phẩm vào giỏ hàng do sản phẩm đã vượt quá số lượng tối đa có trong kho là: "${productVariantQuantity}"
                `;
              } else {
                product.quantity++;
                containtBuyProductForm.classList.remove("overlay--active-5");
              }
            } 
          });
          if (checkProductInCart == false) {
            productInCart.push(productObject);
            containtBuyProductForm.classList.remove("overlay--active-5");
          }
        } else {
          productInCart = [];
          productInCart.push(productObject);
          containtBuyProductForm.classList.remove("overlay--active-5");
        }
        let showProductQuantityInCartList = document.querySelectorAll('.js-cart-quantity');
        showProductQuantityInCartList.forEach(element => {
          element.style.display = 'flex';
          element.innerHTML = productInCart.length;
        });

        localStorage.setItem('productInCart', JSON.stringify(productInCart));
      }
    });

    if (checkChooseProductSize == false) {
      let buyProductFormNotification = document.querySelector('.js-buy-product-form-notification');
      buyProductFormNotification.innerHTML = 'Bạn vui lòng chọn kích thước trước khi thêm sản phẩm vào giỏ hàng ~';
    }

    // console.log(productInCart); // ##################################
  })
})