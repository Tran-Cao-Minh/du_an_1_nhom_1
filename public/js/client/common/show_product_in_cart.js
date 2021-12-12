window.addEventListener('load', function () {
  const containProductQuantityInCartList = document.querySelectorAll('.js-cart-quantity');
  containProductQuantityInCartList.forEach(element => {
    if (localStorage.getItem('productInCart') !== null) {
      let productInCart = JSON.parse(localStorage.getItem('productInCart'));
      element.style.display = 'flex';
      let productQuantity = 0;
      productInCart.forEach(product => {
        productQuantity += product.quantity;
      });
      element.innerHTML = productQuantity;

    } else {
      element.style.display = 'none';
    }
  });

  const showBasketSummaryArea = document.querySelector('.js-load-basket-summary');
  const basketNotification = document.querySelector('.js-basket-empty-notification');
  const containBasketSummary = document.querySelector('.js-show-basket-summary');
  showBasketSummaryArea.addEventListener('mouseenter', function () {
    if (localStorage.getItem('productInCart') !== null) {
      basketNotification.style.display = 'none';
      containBasketSummary.style.display = 'block';

      let containBasketProduct = containBasketSummary.querySelector('.js-contain-basket-product');
      let productInCart = JSON.parse(localStorage.getItem('productInCart'));

      let basketSum = 0;
      containBasketProduct.innerHTML = '';
      productInCart.forEach(product => {
        basketSum += (product.price * product.quantity);
        let productPriceFormat = product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        containBasketProduct.innerHTML += `
          <li class="header__product-item">
            <div class="header__contain-product-img">
              <img class="header__product-img" 
                src="../public/image/product/${product.image}"
              >
            </div>
            <div class="header__contain-product-inf">
              <div class="header__product-name">
                ${product.name}
              </div>
              <div class="header__product-basket-inf">
                <div class="header__product-basket-parameter">
                  <div class="header__product-basket-color" 
                    style="--bg-color: #${product.color};"
                  >
                  </div>
                  <div class="header__product-basket-size">
                    ${product.size}
                  </div>
                  <div class="header__product-basket-price">
                    ${productPriceFormat} đ
                  </div>
                  <div class="header__product-basket-quantity">
                    ${product.quantity}
                  </div>
                </div>
                <button class="js-delete-product-in-cart header__cancel-product-btn"
                  data-id="${product.id}"
                  data-color="${product.color}"
                  data-size="${product.size}"
                >
                  <i class="fas fa-trash-alt header__cancel-icon"></i>
                </button>
              </div>
            </div>
          </li>
        `;
      });

      let containSumBasket = containBasketSummary.querySelector('.js-basket-sum-money');
      basketSum = basketSum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      basketSum += ' đ';
      containSumBasket.innerHTML = basketSum;

      let deleteProductBtnList = containBasketSummary.querySelectorAll('.js-delete-product-in-cart');
      deleteProductBtnList.forEach(btn => {
        btn.addEventListener('click', function() {
          let productItem = btn.parentElement.parentElement.parentElement;
          containBasketProduct.removeChild(productItem);

          let productId = btn.dataset.id;
          let productColor = btn.dataset.color;
          let productSize = btn.dataset.size;

          productInCart.forEach(function(product, index) {
            if (
              product.id == productId &&
              product.color == productColor &&
              product.size == productSize
            ) {
              productInCart.splice(index, 1);
            } 
          });

          if (productInCart.length == 0) {
            localStorage.removeItem('productInCart');
            basketNotification.style.display = 'block';
            containBasketSummary.style.display = 'none';
          } else {
            localStorage.setItem('productInCart', JSON.stringify(productInCart));
          }

          containProductQuantityInCartList.forEach(element => {
            if (localStorage.getItem('productInCart') !== null) {
              let productInCart = JSON.parse(localStorage.getItem('productInCart'));
              element.style.display = 'flex';
              let productQuantity = 0;
              productInCart.forEach(product => {
                productQuantity += product.quantity;
              });
              element.innerHTML = productQuantity;
        
            } else {
              element.style.display = 'none';
            }
          });
        })
      });
    } else {
      basketNotification.style.display = 'block';
      containBasketSummary.style.display = 'none';
    }
  })
})