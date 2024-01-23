// //login.js
const form = document.querySelector("form");
const email = form.login;
const password = form.password;
const emailError = document.querySelector(".emailError");
const passwordError = document.querySelector(".passwordError");
const pwdForgotten = document.querySelector(".pwdForgotten");

form.addEventListener("input", (e) => {
    const emailInputValue = email.value.trim();
    const emailRegex = /^[^\s@]+@ccicampus\.fr$/;

    if (emailInputValue.length >= 2) {
        if (emailRegex.test(emailInputValue)) {
            email.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
            email.placeholder = "";
        } else {
            email.style.backgroundColor = "rgba(255, 0, 0, 0.7)";
            email.placeholder = "Exemple@ccicampus.fr";
        }
    } else {
        email.style.backgroundColor = "";
        email.placeholder = "Entrez votre email";
    }
    console.log(email.style.borderColor);

    const passwordInputValue = password.value.trim();
    const passwordRegex =
        /^(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*\d){2})(?=(.*[\W_]){2})[\S]{12,}$/;

    if (passwordInputValue.length >= 2) {
        if (passwordRegex.test(passwordInputValue)) {
            password.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
            password.placeholder = "";
        } else {
            password.style.backgroundColor = "rgba(255, 0, 0, 0.7)";
            password.placeholder = "ex : 12ABcd!#";
        }
    } else {
        password.style.backgroundColor = "";
        password.placeholder = "Entrez votre mot de passe";
    }
});

form.addEventListener("submit", (e) => {
    e.preventDefault();
    emailError.style.color = "red";
    passwordError.style.color = "red";
    if (email.value === "") {
        emailError.textContent = "**L'email est requis**";
    } else {
        emailError.textContent = "";
    }

    passwordError.textContent = "";

    if (password.value === "") {
        passwordError.textContent = "**Le mot de passe est requis**";
    } else if (password.value.length < 12) {
        passwordError.textContent =
            "**Le mot de passe doit comporter au moins 12 caractères**";
    } else if (password.value.length > 50) {
        passwordError.textContent =
            "**Le mot de passe doit comporter moins de 50 caractères**";
    }

    if (emailError.textContent === "" && passwordError.textContent === "") {
        form.submit();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const pwdForgotten = document.querySelector(".pwdForgotten");

    if (pwdForgotten) {
        pwdForgotten.addEventListener("click", function (e) {
            e.preventDefault();
            console.log("Clic détecté sur pwdForgotten");
            showModal();
        });
    } else {
        console.error("Élément .pwdForgotten non trouvé dans le DOM.");
    }

    function showModal() {
        const modal = document.createElement("div");
        modal.className = "modal";
        modal.innerHTML =
            "<p>Un nouveau mot de passe provisoire va vous être envoyé dans votre boîte mail.</p>";

        document.body.appendChild(modal);
        setTimeout(function () {
            modal.remove();
        }, 3000);
    }
});
