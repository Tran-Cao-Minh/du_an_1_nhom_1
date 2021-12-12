function  changeImage(id){
    let imagePath=document.getElementById(id).getAttribute('src');
    document.getElementById('img_main').setAttribute('src',imagePath);

}
//Thêm sản phẩm
$('input.product__choose-number-count').each(function () {
    var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
    if (min == 0) {
        var d = 0
    } else d = min
    $(qty).on('click', function () {
        if ($(this).hasClass('product__choose-number-decrease')) {
            if (d > min) d += -1
        } else if ($(this).hasClass('product__choose-number-increase')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
    })
})