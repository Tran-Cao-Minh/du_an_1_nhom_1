
  //khai báo biến slideIndex đại diện cho slide hiện tại
  var slideIndex;
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  function prevSlides(n) {
    showSlides(slideIndex -= n);
  }
  // KHai bào hàm hiển thị slide
  function showSlides() {
      var i;
      var slides = document.getElementsByClassName("js-banner");
      var dots = document.getElementsByClassName("banner__index");
      for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" banner__index--choosen", "");
      }
 
      slides[slideIndex].style.display = "block";  
      dots[slideIndex].className += " banner__index--choosen";
      //chuyển đến slide tiếp theo
      slideIndex++;
      //nếu đang ở slide cuối cùng thì chuyển về slide đầu
      if (slideIndex > slides.length - 1) {
        slideIndex = 0
      }    
      //tự động chuyển đổi slide sau 4s
      setTimeout(showSlides, 4000);
  }
  //mặc định hiển thị slide đầu tiên 
  showSlides(slideIndex = 0);
 
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }