window.addEventListener('load', function () {
    const buyProdBtn = document.querySelectorAll('.js-buy-prod-btn');
    const closeBuyProdBtn = document.querySelector('.js-close-buy-prod-btn')
    const overlayFive = document.querySelector('.overlay-5');

    // Mở popup mua sản phẩm
    buyProdBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            overlayFive.classList.add("overlay--active-5");
        })
    })

    // Đóng popup mua sản phẩm
    closeBuyProdBtn.addEventListener('click', () => {
        overlayFive.classList.remove("overlay--active-5");
    })

})