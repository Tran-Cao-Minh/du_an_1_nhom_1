// window.addEventListener('load',function() {
//   const LoginAccount = document.querySelector(".form__group #LoginAccount");
//   let ckLoginAccount = false; 

//   function ckLoginAccountFunction(){
//     let form__message = LoginAccount.parentElement.querySelector('.form__message')
//   }
//   // 
//     ckLoginAccount = false;
//     form__message.style.color = 'var(--red)';
//     LoginAccount.style.borderColor = 'var(--red)';

//   // 
//   if (loginAccount.value === "") {
//     form__message.innerHTML = '* Vui lòng nhập tài khoản của bạn';
//   } else if (/^\s/.test(loginAccount.value)) {
//     form__message.innerHTML = '*Tài khoản không được bắt đầu bằng dấu cách';
//   } else {
//     form__message.innerHTML = '<i class="far fa-eye-slash "></i>';
//     ckLoginAccount = true;
//     form__message.style.color = 'var(--secondary-color)';
//     loginAccount.style.borderColor = 'var(--secondary-color)';
//   }
// });

const loginAccount = document.querySelector(".form__group #logAccount");
let ckLoginAccount = false;
// khai bao ham kiem tra ten dang nhap
function ckLoginAccountFunction() {
    let form__message = loginAccount.parentElement.querySelector('.form__message'); // lay noi chua thong bao

    // dat trang thai mac dinh la false
    ckLoginAccount = false;
    form__message.style.color = 'var(--red)';
    loginAccount.style.borderColor = 'var(--red)';

    // kiem tra gia tri
    if (loginAccount.value === "") {
        form__message.innerHTML = '* Vui lòng nhập tài khoản của bạn!';

    } else if (/^\s/.test(loginAccount.value)) {
        form__message.innerHTML = '* Tài khoản không được bắt đầu bằng dấu cách!';

    } 
    // else {
    //     form__message.innerHTML = '<i class="fas fa-check"></i>';
    //     // dung thi doi trang thai
    //     ckLoginAccount = true;
    //     form__message.style.color = 'var(--secondary-color)';
    //     loginAccount.style.borderColor = 'var(--secondary-color)';
    // }
  };
