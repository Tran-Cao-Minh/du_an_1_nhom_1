
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
          dots[i].className = dots[i].className.replace(" banner__index--choosen", "");
      }
      slides[slideIndex].style.display = "block";  
      dots[slideIndex].className += " banner__index--choosen";
      //chuyển đến slide tiếp theo
      slideIndex++;
      //nếu đang ở slide cuối cùng thì chuyển về slide đầu
      if (slideIndex > slides.length - 1) {
        slideIndex = 0;
      }    
      //tự động chuyển đổi slide sau 4s
      setTimeout(showSlides, 4000);
  }
  //mặc định hiển thị slide đầu tiên 
  showSlides(slideIndex = 0);
 
  // nút điều khi
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
/*let currentIndex = 1; // xac dinh anh hien tai
// lay phan tu xac dinh vi tri anh vao mang
let dot = document.getElementsByClassName("banner_index");
let slideArray = document.querySelectorAll(".banner__contain-img"); // lay anh vao mang
// cho anh dau tien hien thi
document.querySelector(".banner__contain-img:nth-child(" + 1 + ")")
    .style.left = 0;
// them, xu ly su kien chuyen toi anh tiep theo
document.querySelector(".banner__next-btn")
    .addEventListener('click', function () {
        // xu ly nextIndex 1 --> 5
        let nextIndex = currentIndex + 1;
        if (nextIndex > slideArray.length) {
            nextIndex = 1;
        }
        // * nth:child chay bat dau tu 1 
        // xu ly hieu ung khi chuyen anh
        document.querySelector(".banner__contain-img:nth-child(" + (nextIndex) + ")")
            .style.left = "100%";
        document.querySelector(".banner__contain-img:nth-child(" + (nextIndex) + ")")
            .setAttribute("class", "imgIn");
        document.querySelector(".banner__contain-img:nth-child(" + (currentIndex) + ")")
            .style.left = 0;
        document.querySelector(".banner__contain-img:nth-child(" + (currentIndex) + ")")
            .setAttribute("class", "imgOutLeft");
        // cap nhat currentIndex
        currentIndex = nextIndex;
        // hien thi vi tri anh
        indexChange();
    });
// end them, xu ly su kien chuyen toi anh tiep theo
// them, xu ly su kien quay lai anh phia truoc
document.querySelector(".banner__prev-btn")
    .addEventListener('click', function () {
        // xu ly prevIndex 1 --> 5
        let prevIndex = currentIndex - 1;
        if (prevIndex < 1) { // do dai mang nho nhat la 1
            prevIndex = slideArray.length;
        }
        // * nth:child chay bat dau tu 1
        // xu ly hieu ung khi chuyen anh
        document.querySelector(".banner__contain-img:nth-child(" + (prevIndex) + ")")
            .style.left = "-100%";
        document.querySelector(".banner__contain-img:nth-child(" + (prevIndex) + ")")
            .setAttribute("class", "imgIn");
        document.querySelector(".banner__contain-img:nth-child(" + (currentIndex) + ")")
            .style.left = 0;
        document.querySelector(".banner__contain-img:nth-child(" + (currentIndex) + ")")
            .setAttribute("class", "imgOutRight");
        // cap nhat currentIndex
        currentIndex = prevIndex;
        // hien thi vi tri anh
        indexChange();
    });
// end them, xu ly su kien quay lai anh phia truoc
// nhan vao dau cham chuyen den anh tuong ung
for (let i = 0; i < dot.length; i++) {
    dot[i].addEventListener("click", function () {
        while (currentIndex != (i + 1)) {
            if (currentIndex < (i + 1)) {
                document.querySelector(".banner__next-btn").click();
            } else {
                document.querySelector(".banner__prev-btn").click();
            }
        }
    });
}
function indexChange() {
  for (let i = 0; i < dot.length; i++) {
      if (dot[i].id == String(currentIndex)) {
          dot[i].style.opacity = 1;
      } else {
          dot[i].style.opacity = 0.3;
      }
  }
}
let autoSwitch = setInterval(
  function () {
      document.querySelector(".banner__next-btn").click();
  },
  4000
);*/


/*Start slide top 5 product*/
