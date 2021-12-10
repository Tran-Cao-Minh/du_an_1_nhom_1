document.addEventListener("DOMContentLoaded",function(){
    //Truy xuất phần tử 2 nút trái phải và các slide
    let nut = document.querySelectorAll('div.button__icon ul li'),
        nuttrai = nut[0],
        nutphai = nut[1];
    /*let nuttrai=document.getElementsByClassName('prev__icon');
    let nutphai=document.getElementsByClassName('next__icon');*/
    let slides = document.querySelectorAll('div.prod__detail-large__image ul li');
    // Tìm ra số phần tử cuối cùng vì là mảng nên chúng ta sẽ lấy độ dài của mảng - 1
    let cuoicung = slides.length - 1;
    //Khi click nút trái
    let anhnho = document.querySelectorAll('ul.prod__detail-other li');
       // Truy xuất tất cả ảnh nhỏ
    chuyenslide = function(){
        //1.Lấy vị trí slide hiện tại
        let vitrislideht = 0
        let slideht = document.querySelector('ul li.prod__detail-image-item--pop_up');
        for(let i = 0; i<(slideht = slideht-1); vitrislideht++){
 
        }// đã lấy được vị trí sau khi thực hiện vòng lặp for này.
        //2. Bỏ tất cả các class hienlen
        for(let i = 0; i < slides.length; i++){
            slides[i].classList.remove('prod__detail-image-item--pop_up');
            anhnho[i].classList.remove('prod__detail-other-item--choosen');
        }
        //3.2 Khi slide chuyển đến 0 thì đặt vitrislide hien tại = vitricuoicung + 1 
        if(vitrislideht == 0){
            vitrislideht = cuoicung + 1;
            slides[vitrislideht-1].classList.add('prod__detail-other-item--pop_up');
            anhnho[vitrislideht-1].classList.add('prod__detail-other-item--choosen');
        }
        else{
        //3.1 Chuyển sang slide phía sau 
        slides[vitrislideht-1].classList.add('prod__detail-other-item--pop_up');
        anhnho[vitrislideht-1].classList.add('prod__detail-other-item--choosen');
        }
 
    }
    // Chỉ cần thực hiện 1 hàm r x2 lên thay đổi 1 tí là dc!!!
    chuyenslidep = function(){
        //1.Lấy vị trí slide hiện tại
        let vitrislideht = 0;
        let slideht = document.querySelector('.prod__detail-image ul li.prod__detail-image-item--pop_up');
        for(let i = 0; i<(slideht = slideht-1); vitrislideht++){
 
        }// đã lấy được vị trí sau khi thực hiện vòng lặp for này.
        //2. Bỏ tất cả các class hienlen
        for(let i = 0; i < slides.length; i++){
            slides[i].classList.remove('prod__detail-image-item--pop_up');
            anhnho[i].classList.remove('prod__detail-image-item--choosen');
        }
        if(vitrislideht == cuoicung){
            vitrislideht = -1;
        //ở đây mình k cần dùng else vì khi thực hiện xong lệnh if nó sẽ nhảy xuống thực hiện lệnh add class luôn. 
        }
        //3. Chuyển sang slide lên trước
        slides[vitrislideht+1].classList.add('prod__detail-image-item--pop_up');
        //4. Đến slide đầu tiên thì chuyển đến nó đến vị trí cuôi cùng.
        anhnho[vitrislideht+1].classList.add('prod__detail-image-item--choosen');
    }
 
    nuttrai.addEventListener('click',chuyenslide);
    nutphai.addEventListener('click',chuyenslidep);
},false)