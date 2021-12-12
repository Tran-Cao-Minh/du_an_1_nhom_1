window.addEventListener('load', function () {
  const inputProductColor = document.querySelectorAll('.js-get-product-variant-color');
  const sizeContainer = document.querySelector('.js-contain-product-size');
  const productMainImg = document.querySelector('.js-product-main-img');
  const productImgContainer = document.querySelector('.js-contain-img-list');
  const productRemainQuantity = document.querySelector('.js-remain-product-quantiy');

  inputProductColor.forEach(input => {
    input.addEventListener('change', function () {
      if (input.checked == true) {
        productRemainQuantity.innerHTML = '?';
        sizeContainer.innerHTML = '';
        let dataSizeList = input.dataset.size.split(" ");
        let dataQuantityList = input.dataset.quantity.split(" ");
        let colorId = input.dataset.colorId;
        dataSizeList.forEach(function (size, index) {
          if (dataQuantityList[index] > 0) {
            sizeContainer.innerHTML += `
              <label class="product__filter-item">
                <input type="radio" id="buy_product_form_${size}"
                  class="js-get-product-variant-size"
                  name="product_variant_size_in_buy_product_form"
                  data-quantity="${dataQuantityList[index]}"
                  data-size="${size}"
                  data-color="${colorId}"
                >
                <label class="product__filter-label-size" for="buy_product_form_${size}">
                  <span class="prodduct__size-name">
                    ${size}
                  </span>
                </label>
              </label>
            `;
          } else {
            sizeContainer.innerHTML += `
              <div class="product__filter-item product__filter-label--disabled">
                <div class="product__filter-label-size">
                  <span class="prodduct__size-name">
                    ${size}
                  </span>
                </div>
              </div>
            `;
          }
        });

        productImgContainer.innerHTML = '';
        let dataImgList = input.dataset.image.split(" ");
        productMainImg.src = '../public/image/product/' + dataImgList[0];
        productMainImg.dataset.image = dataImgList[0];
        dataImgList.forEach(img => {
          productImgContainer.innerHTML += `
            <li class="js-product-sub-img prod__detail-other-item">
              <img class="" src="../public/image/product/${img}">
            </li>
          `;
        });

        let productSubImgList = document.querySelectorAll('.js-product-sub-img');
        productSubImgList.forEach(img => {
          img.addEventListener('mouseenter', function () {
            productMainImg.src = img.querySelector('img').src;
          })
        });

        let productInputSizeList = document.querySelectorAll('.js-get-product-variant-size');
        productInputSizeList.forEach(input => {
          input.addEventListener('click', function () {
            productRemainQuantity.innerHTML = input.dataset.quantity;
          })
        });
      }
    })
  });

  // click input color first when go to this page
  inputProductColor[0].click();

  const inputProductQuantity = document.querySelector('.js-product-quantity');
  inputProductQuantity.addEventListener('input', function () {
    if (this.value < 1) {
      this.value = 1;
    } else if (this.value >= 99) {
      this.value = 99;
    }
  })

  document.querySelector('.js-sub-product-quantity').addEventListener('click', function () {
    if (inputProductQuantity.value > 1) {
      inputProductQuantity.value--;
    }
  })

  document.querySelector('.js-add-product-quantity').addEventListener('click', function () {
    if (inputProductQuantity.value < 99) {
      inputProductQuantity.value++;
    }
  })

  const addProductToBasketBtn = document.querySelector('.js-buy-product-add');
  const productName = document.querySelector('.js-product-name').innerHTML;
  const productPrice = document.querySelector('.js-product-price').dataset.price;
  const buyProductNotification = document.querySelector('.js-buy-product-notification');
  addProductToBasketBtn.addEventListener('click', function () {
    let checkChooseProductSize = false;
    let productVariantSize = '';
    let inputSizeList = document.querySelectorAll('.js-get-product-variant-size');
    inputSizeList.forEach(input => {
      if (input.checked == true) {
        checkChooseProductSize = true;

        productVariantSize = input.dataset.size;
        let productVariantQuantity = parseInt(input.dataset.quantity);
        let productVariantColor = input.dataset.color;
        let productVariantImg = productMainImg.dataset.image;
        let productId = this.dataset.id;
        let productQuantity = parseInt(inputProductQuantity.value);

        let productObject = {
          'id': productId,
          'color': productVariantColor,
          'name': productName,
          'image': productVariantImg,
          'price': productPrice,
          'size': productVariantSize,
          'quantity': productQuantity
        };

        if (localStorage.getItem('productInCart') !== null) {
          let productInCart = JSON.parse(localStorage.getItem('productInCart'));
          let checkProductInCart = false;
          productInCart.forEach(product => {
            if (
              product.id == productId &&
              product.color == productVariantColor &&
              product.size == productVariantSize
            ) {
              let productQuantityAfterAdd = parseInt(product.quantity) + parseInt(productQuantity);
              checkProductInCart = true;
              if (productQuantityAfterAdd > productVariantQuantity) {
                buyProductNotification.style.display = 'block';
                buyProductNotification.innerHTML = `
                  Bạn không thể thêm sản phẩm vào giỏ hàng do số lượng sản phẩm sau khi thêm vượt quá số lượng tối đa có trong kho là: "${productVariantQuantity}"
                `;
              } else {
                buyProductNotification.style.display = 'none';
                product.quantity = productQuantityAfterAdd;

                let showProductQuantityInCartList = document.querySelectorAll('.js-cart-quantity');
                showProductQuantityInCartList.forEach(element => {
                  element.style.display = 'flex';
                  let productQuantity = 0;
                  productInCart.forEach(product => {
                    productQuantity += product.quantity;
                  });
                  element.innerHTML = productQuantity;
                });
                localStorage.setItem('productInCart', JSON.stringify(productInCart));
              }
            }
          });
          if (checkProductInCart == false) {
            if (productQuantity <= productVariantQuantity) {
              buyProductNotification.style.display = 'none';
              productInCart.push(productObject);

              let showProductQuantityInCartList = document.querySelectorAll('.js-cart-quantity');
              showProductQuantityInCartList.forEach(element => {
                element.style.display = 'flex';
                let productQuantity = 0;
                productInCart.forEach(product => {
                  productQuantity = parseInt(product.quantity) + parseInt(productQuantity);
                });
                element.innerHTML = productQuantity;
              });
              localStorage.setItem('productInCart', JSON.stringify(productInCart));
            } else {
              buyProductNotification.style.display = 'block';
              buyProductNotification.innerHTML = `
                Bạn không thể thêm sản phẩm vào giỏ hàng do số lượng sản phẩm sau khi thêm vượt quá số lượng tối đa có trong kho là: "${productVariantQuantity}"
              `;
            }
          }
        } else {
          if (productQuantity <= productVariantQuantity) {
            buyProductNotification.style.display = 'none';
            productInCart = [];
            productInCart.push(productObject);

            let showProductQuantityInCartList = document.querySelectorAll('.js-cart-quantity');
            showProductQuantityInCartList.forEach(element => {
              element.style.display = 'flex';
              let productQuantity = 0;
              productInCart.forEach(product => {
                productQuantity = parseInt(product.quantity) + parseInt(productQuantity);
              });
              element.innerHTML = productQuantity;
            });
            localStorage.setItem('productInCart', JSON.stringify(productInCart));
          } else {
            alert(productQuantity);
            alert(productVariantQuantity);

            buyProductNotification.style.display = 'block';
            buyProductNotification.innerHTML = `
              Bạn không thể thêm sản phẩm vào giỏ hàng do số lượng sản phẩm sau khi thêm vượt quá số lượng tối đa có trong kho là: "${productVariantQuantity}"
            `; 
          }
        }
      }
    });

    if (checkChooseProductSize == false) {
      buyProductNotification.style.display = 'block';
      buyProductNotification.innerHTML = 'Bạn vui lòng chọn kích thước trước khi thêm sản phẩm vào giỏ hàng ~';
    }
  })
})