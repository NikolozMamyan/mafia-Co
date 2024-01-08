// const form = document.querySelector(".signup form"),
// continueBtn = form.querySelector(".button"),
// errorText = form.querySelector(".error-text");

// form.onsubmit = (e)=>{
//     e.preventDefault();
// }

// continueBtn.onclick = ()=>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/signup.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//               let data = xhr.response;
//               if(data === "success"){
//                 location.href="users.php";
//               }else{
//                 errorText.style.display = "block";
//                 errorText.textContent = data;
//               }
//           }
//       }
//     }
//     let formData = new FormData(form);
//     xhr.send(formData);
// }
// validation bootstrap
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})();
//provisoire bouton de redirection vers login
document.addEventListener('DOMContentLoaded', function() {
 
  const btnClose = document.querySelector('.btn-close');

  if (btnClose) {
      
      btnClose.addEventListener('click', function() {
          // Redirection au clic sur le bouton
          window.location.href = '../public/profile.php';
      });
  } 

  // provisoire bouton de redirection vers login
  const formulaireSignup = document.querySelector('.form__signup');

  if (formulaireSignup) {
      
      formulaireSignup.addEventListener('submit', function(event) {
          // Empêcher le comportement par défaut du formulaire (éviter une soumission normale)
          event.preventDefault();

          // Redirection après la soumission du formulaire
          // window.location.href = '../public/login.php';
      });
  } 
});
function toggleCheckboxStyle(checkbox) {
  var label = checkbox.parentElement;

  if (checkbox.checked) {
    label.classList.add('checked');
  } else {
    label.classList.remove('checked');
  }
}