// const pswrdField = document.querySelector(".form input[type='password']"),
// toggleIcon = document.querySelector(".form .field i");

// toggleIcon.onclick = () =>{
//   if(pswrdField.type === "password"){
//     pswrdField.type = "text";
//     toggleIcon.classList.add("active");
//   }else{
//     pswrdField.type = "password";
//     toggleIcon.classList.remove("active");
//   }
// }
document.addEventListener('DOMContentLoaded', function () {
  var togglePassword = document.querySelector('.toggle-password');
  var passwordField = document.getElementById('password');
  var eyeIcon = togglePassword.querySelector('i');

  togglePassword.addEventListener('click', function () {
    // Toggle password visibility
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  });
});