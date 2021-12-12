window.addEventListener('load', function () {
  const sumBasketContainer = document.querySelector('.js-show-sum-basket');
  const basketEmptyNotification = document.querySelector('.js-basket-empty-notification-cart-page');
  const detailProductTitle = document.querySelector('.js-detail-product-title');
  const containBasketProduct = document.querySelector('.js-contain-basket-product-cart-page');
  const basketSubMenu = document.querySelector('.js-hide-basket-in-cart-page');
  const cartQuantityShow = document.querySelector('.js-cart-quantity');

  basketSubMenu.style.display = 'none';

  if (localStorage.getItem('productInCart') !== null) {
    basketEmptyNotification.style.display = 'none';
    let productInCart = JSON.parse(localStorage.getItem('productInCart'));

    function changeCartQuantity (quantity) {
      let cartQuantity = parseInt(cartQuantityShow.innerHTML);
      cartQuantityShow.innerHTML = cartQuantity + quantity;
    }

    function updateBasket (
      productId,
      color,
      size,
      quantity
    ) {
      let productInCart = JSON.parse(localStorage.getItem('productInCart'));
      productInCart.forEach(product => {
        if (
          product.id == productId &&
          product.color == color &&
          product.size == size
        ) {
          product.quantity = parseInt(product.quantity) + parseInt(quantity);
        }
      })
      localStorage.setItem('productInCart', JSON.stringify(productInCart));
    }

    let basketSum = 0;
    productInCart.forEach(product => {
      basketSum += (product.price * product.quantity);
      let productPriceFormat = product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      containBasketProduct.innerHTML += `
        <div class="cart__prod-item">
          <div class="cart__prod-item-image">
            <img src="../public/image/product/${product.image}">
          </div>
          <div class="cart__prod-item-info">
            <div class="cart__prod-item-info-name">
              ${product.name}
            </div>
            <div class="cart__prod-item-info-variant">
              <label class="cart__prod-item-info-variant-color" 
                style="--bg-color: #${product.color};"
              >
              </label>
              <div class="cart__prod-item-info-variant-size">
                ${product.size}
              </div>
              <div class="cart__prod-item-info-variant-price">
                ${productPriceFormat} đ
              </div>
            </div>
            <div class="cart__prod-item-info-action">
              <div class="product__choose-number">
                <div class="js-sub-product-quantity product__choose-number-decrease">
                  <i class="fas fa-minus"></i>
                </div>
                <input type="number" class="js-change-product-quantiy product__choose-number-count"
                  value="${product.quantity}" 
                  data-max="${product.max}"
                  data-old-quantity="${product.quantity}"
                  data-id="${product.id}"
                  data-color="${product.color}"
                  data-size="${product.size}"
                >
                </input>
                <div class="js-add-product-quantity product__choose-number-increase">
                  <i class="fas fa-plus"></i>
                </div>
              </div>
              <div class="js-quantity-error">
              </div>
              <button 
                class="js-delete-product-in-cart-page cart__prod-item-info-action-close"
                data-id="${product.id}"
                data-color="${product.color}"
                data-size="${product.size}"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
      `;
    });
    basketSum = basketSum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    sumBasketContainer.querySelector('.js-sum-basket').innerHTML = basketSum + ' đ';

    const productInputChangeQuantityList = document.querySelectorAll('.js-change-product-quantiy');
    productInputChangeQuantityList.forEach(input => {
      input.addEventListener('input', function () {
        let max = parseInt(input.dataset.max);
        let errorNotification = input.parentElement.parentElement.querySelector('.js-quantity-error');
        input.value = parseInt(input.value); 
        let oldQuantity = parseInt(input.dataset.oldQuantity);
        if (input.value < 1) {
          input.value = 1;
          errorNotification.innerHTML = '';
        } else if (input.value >= max) {
          input.value = max;
          errorNotification.innerHTML = `
            Số lượng tối đa còn lại trong kho là "${max}"
          `;
        } else {
          errorNotification.innerHTML = '';
        }
        input.dataset.oldQuantity = input.value;
        let addQuantity = parseInt(input.value) - oldQuantity;
        changeCartQuantity(addQuantity);
         
        let productId = input.dataset.id;
        let color = input.dataset.color;
        let size = input.dataset.size;
        updateBasket (
          productId,
          color,
          size,
          addQuantity
        );
      })
    });

    const productInputSubQuantityList = document.querySelectorAll('.js-sub-product-quantity');
    productInputSubQuantityList.forEach(input => {
      input.addEventListener('click', function () {
        let productQuantity = input.parentElement.querySelector('.js-change-product-quantiy');
        let errorNotification = input.parentElement.parentElement.querySelector('.js-quantity-error');
        if (productQuantity.value > 1) {
          productQuantity.value--;
          changeCartQuantity(-1);
          errorNotification.innerHTML = '';

          let productId = productQuantity.dataset.id;
          let color = productQuantity.dataset.color;
          let size = productQuantity.dataset.size;
          updateBasket (
            productId,
            color,
            size,
            -1
          );
        }
      })
    });

    const productInputAddQuantityList = document.querySelectorAll('.js-add-product-quantity');
    productInputAddQuantityList.forEach(input => {
      input.addEventListener('click', function () {
        let productQuantity = input.parentElement.querySelector('.js-change-product-quantiy');
        let max = parseInt(productQuantity.dataset.max);
        let errorNotification = input.parentElement.parentElement.querySelector('.js-quantity-error');
        if (productQuantity.value < max) {
          productQuantity.value++;
          changeCartQuantity(1);
          errorNotification.innerHTML = '';
          
          let productId = productQuantity.dataset.id;
          let color = productQuantity.dataset.color;
          let size = productQuantity.dataset.size;
          updateBasket (
            productId,
            color,
            size,
            1
          );
        }
        if (productQuantity.value == max) {
          errorNotification.innerHTML = `
            Số lượng tối đa còn lại trong kho là "${max}"
          `;
        }
      })
    });

    const deleteProductInCartBtn = document.querySelectorAll('.js-delete-product-in-cart-page');
    deleteProductInCartBtn.forEach(btn => {
      btn.addEventListener('click', function () {
        let productId = btn.dataset.id;
        let color = btn.dataset.color;
        let size = btn.dataset.size;
        let quantity = btn.parentElement.querySelector('.js-change-product-quantiy').value;
        quantity = parseInt(quantity);
        changeCartQuantity(-quantity);

        let productInCart = JSON.parse(localStorage.getItem('productInCart'));
        productInCart.forEach(function (product, index) {
          if (
            product.id == productId &&
            product.color == color &&
            product.size == size
          ) {
            productInCart.splice(index, 1);
          }
        })
        if (productInCart.length == 0) {
          localStorage.removeItem('productInCart');
          cartQuantityShow.style.display = 'none';
          sumBasketContainer.style.display = 'none';
          detailProductTitle.style.display = 'none';
          basketEmptyNotification.style.display = 'block';

        } else {
          localStorage.setItem('productInCart', JSON.stringify(productInCart));
        }

        let productItem = btn.parentElement.parentElement.parentElement;
        containBasketProduct.removeChild(productItem);
      })
    });

  } else {
    sumBasketContainer.style.display = 'none';
    detailProductTitle.style.display = 'none';
  }
})