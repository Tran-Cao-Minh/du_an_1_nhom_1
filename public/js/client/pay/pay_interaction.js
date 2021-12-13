window.addEventListener('load', function () {
  const basketSubMenu = document.querySelector('.js-hide-basket-in-cart-page');
  basketSubMenu.style.display = 'none';

  const confirmPayBtn = document.querySelector('.js-pay-btn');
  const showPaySum = document.querySelector('.js-pay-sum');
  if (localStorage.getItem('productInCart') !== null) {
    let productInCart = JSON.parse(localStorage.getItem('productInCart'));
    let paySum = 0;
    productInCart.forEach(product => {
      paySum += (product.price * product.quantity);
    });
    paySum = paySum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    showPaySum.innerHTML = paySum + ' đ';

  } else {
    showPaySum.innerHTML = 'Giỏ hàng rỗng ~';
    confirmPayBtn.style.display = 'none';
  }
})