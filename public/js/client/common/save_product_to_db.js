window.addEventListener('load', function () {
  let productInCart = '';
  if (localStorage.getItem('productInCart') !== null) {
    productInCart = JSON.parse(localStorage.getItem('productInCart'));
  } 
  $.ajax({
    url: '../../../../../du_an_1_nhom_1/ajax/ajax_save_order.php',
    type: 'GET',
    dataType: 'html',
    data: {
      cart_info: productInCart,
    }
  }).done(function (output) {
    console.log(output);  
  })
})