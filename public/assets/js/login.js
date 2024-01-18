// //login.js
// const form = document.querySelector('form');
// const email = form.email;
// const password = form.password;
// const emailError = document.querySelector('.emailError');
// const passwordError = document.querySelector('.passwordError');
// const pwdForgotten = document.querySelector('.pwdForgotten');

// form.addEventListener('input', (e) => {
//     const emailInputValue = email.value.trim();
//     const emailRegex = /^[^\s@]+@ccicampus\.fr$/;

//     if (emailInputValue.length >= 2) {
//         if (emailRegex.test(emailInputValue)) {
//             email.style.backgroundColor  = "rgba(0, 128, 0, 0.5)";
//             email.placeholder = "";
//         } else {
//             email.style.backgroundColor  = "rgba(255, 0, 0, 0.7)";
//             email.placeholder = "Exemple@ccicampus.fr";
//         }
//     } else {
//         email.style.backgroundColor  = "";
//         email.placeholder = "Entrez votre email";
//     }
//     console.log(email.style.borderColor);

//     const passwordInputValue = password.value.trim();
//     const passwordRegex = /^(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*\d){2})(?=(.*[\W_]){2})[\S]{12,}$/;

//     if (passwordInputValue.length >= 2) {
//         if (passwordRegex.test(passwordInputValue)) {
//             password.style.backgroundColor  = "rgba(0, 128, 0, 0.5)";
//             password.placeholder = "";
//         } else {
//             password.style.backgroundColor  = "rgba(255, 0, 0, 0.7)";
//             password.placeholder = "ex : 12ABcd!#";
//         }
//     } else {
//         password.style.backgroundColor  = "";
//         password.placeholder = "Entrez votre mot de passe";
//     }
// });

// form.addEventListener('submit', (e) => {
//     e.preventDefault();
//     if (email.value === '') {
//         emailError.textContent = '**L\'email est requis**';
//     } else {
//         emailError.textContent = '';
//     }

//     passwordError.textContent = '';

//     if (password.value === '') {
//         passwordError.textContent = 'Le mot de passe est requis';
//     } else if (password.value.length < 12) {
//         passwordError.textContent = 'Le mot de passe doit comporter au moins 12 caractères';
//     } else if (password.value.length > 25) {
//         passwordError.textContent = 'Le mot de passe doit comporter moins de 25 caractères';
//     }

//     if (emailError.textContent === '' && passwordError.textContent === '') {
//         form.submit();
//     }
// });
// pwdForgotten.addEventListener('click', (e) => {
//     console.log('click');
//      showModal();
//   });


// function showModal() {
//     const modal = document.createElement('div');
//     modal.className = 'modal';
//     modal.innerHTML = '<p>un nouveau mot de passe provisoir vous a été envoyé dans votre boite mail</p>';

//     document.body.appendChild(modal);
//     setTimeout(function () {
//       modal.remove();
//     }, 30000);
//   }
// //   $(document).ready(function() {
// //     $("#show_hide_password a").on('click', function(event) {
// //         event.preventDefault();
// //         if($('#show_hide_password input').attr("type") == "text"){
// //             $('#show_hide_password input').attr('type', 'password');
// //             $('#show_hide_password i').addClass( "fa-eye-slash" );
// //             $('#show_hide_password i').removeClass( "fa-eye" );
// //         }else if($('#show_hide_password input').attr("type") == "password"){
// //             $('#show_hide_password input').attr('type', 'text');
// //             $('#show_hide_password i').removeClass( "fa-eye-slash" );
// //             $('#show_hide_password i').addClass( "fa-eye" );
// //         }
// //     });
// // });



