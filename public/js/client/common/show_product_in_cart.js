window.addEventListener('load', function () {
  const containProductQuantityInCartList = document.querySelectorAll('.js-cart-quantity');
  containProductQuantityInCartList.forEach(element => {
    if (localStorage.getItem('productInCart') !== null) {
      let productInCart = JSON.parse(localStorage.getItem('productInCart'));
      element.style.display = 'flex';
      element.innerHTML = productInCart.length;

    } else {
      element.style.display = 'none';
    }
  });

  

})