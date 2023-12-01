// const form = document.querySelector(".login form"),
// continueBtn = form.querySelector(".button input"),
// errorText = form.querySelector(".error-text");

// form.onsubmit = (e)=>{
//     e.preventDefault();
// }

// continueBtn.onclick = ()=>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/login.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//               let data = xhr.response;
//               if(data === "success"){
//                 location.href = "users.php";
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

document.addEventListener('DOMContentLoaded', function() {
 
  // provisoire bouton de redirection vers profile
  const formulaireLogin = document.querySelector('.form__login');

  if (formulaireLogin) {
      
    formulaireLogin.addEventListener('submit', function(event) {
          // Empêcher le comportement par défaut du formulaire (éviter une soumission normale)
          event.preventDefault();

          // Redirection après la soumission du formulaire
          window.location.href = '../public/profile.php';
      });
  } 
});