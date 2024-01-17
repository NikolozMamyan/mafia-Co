//login.js
const form = document.querySelector('form');
const email = form.email;
const password = form.password;
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');
const pwdForgotten = document.getElementById('pwdForgotten');

form.addEventListener('input', (e) => {
    e.preventDefault();

    const inputValue = email.value.trim();
    const emailRegex = /^[^\s@]+@ccicampus\.fr$/;

    if (inputValue.length >= 2) {
        if (emailRegex.test(inputValue)) {
            email.style.borderColor = "green";
            email.placeholder = "";
        } else {
            email.style.borderColor = "red";
            email.placeholder = "Exemple@ccicampus.fr";
        }
    } else {
        email.style.borderColor = "";
        email.placeholder = "Entrez votre email";
    }
});

form.addEventListener('input', (e) => {
    e.preventDefault();

    const inputValue = password.value.trim();
    const passwordRegex = /^(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*\d){2})(?=(.*[\W_]){2})[\S]{12,}$/;

    if (inputValue.length >= 2) {
        if (passwordRegex.test(inputValue)) {
            password.style.borderColor = "green";
            password.placeholder = "";
        } else {
            password.style.borderColor = "red";
            password.placeholder = "ex : 12ABcd!#";
        }
    } else {
        password.style.borderColor = "";
        password.placeholder = "Entrez votre mot de passe";
    }
});

form.addEventListener('submit', (e) => {
    if (email.value === '') {
        emailError.textContent = 'L\'email est requis';
    } else {
        emailError.textContent = '';
    }

    passwordError.textContent = '';

    if (password.value === '') {
        passwordError.textContent = 'Le mot de passe est requis';
    } else if (password.value.length < 12) {
        passwordError.textContent = 'Le mot de passe doit comporter au moins 12 caractères';
    } else if (password.value.length > 25) {
        passwordError.textContent = 'Le mot de passe doit comporter moins de 25 caractères';
    }

    if (emailError.textContent === '' && passwordError.textContent === '') {
        form.submit();
    }
});
pwdForgotten.addEventListener('click', (e) => {
    e.preventDefault();
    showModal();
  });


function showModal() {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = '<p>un nouveau mot de passe provisoir vous a été envoyé dans votre boite mail</p>';

    document.body.appendChild(modal);
    setTimeout(function () {
      modal.remove();
    }, 30000);
  }
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});



