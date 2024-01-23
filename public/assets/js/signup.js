// signup.js

const regexNomPrenom = /^[A-Za-zÀ-ÖØ-öø-ÿ](?:[ -']?(?![ -']{2})[A-Za-zÀ-ÖØ-öø-ÿ])*$/;
const emailRegex = /^[^\s@]+@ccicampus\.fr$/;
const adresseRegex = /^[0-9A-Za-zÀ-ÖØ-öø-ÿ][ -']?(?:(?![ -']{2})[0-9A-Za-zÀ-ÖØ-öø-ÿ])*$/;
const regexCodePostal = /^[0-9]{5}$/;
const regexPhone = /^[0-9]$/;
const passwordRegex = /^(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*\d){2})(?=(.*[\W_]){2})[\S]{12,}$/;

function validateName() {
  const firstName = document.getElementById('firstName').value.trim();
  if (firstName === '') {
    showErrorMessage('Le nom est obligatoire !', 'firstName');
    return false;
  } else if (firstName.length < 2 || firstName.length > 25) {
    showErrorMessage('Le nom doit comporter entre 2 et 25 caractères !', 'firstName');
    return false;
  } else if (!regexNomPrenom.test(firstName)) {
    showErrorMessage('Le nom doit commencez par une lettre et ne peut pas avoir 2 caractères spéciaux qui ce suive', 'firstName');
    return false;
  }
  hideErrorMessage('firstName');
  return true;

}

function validateLastName() {
  const lastName = document.getElementById('lastName').value.trim();
  if (lastName === '') {
    showErrorMessage('Le nom est obligatoire !', 'lastName');
    return false;
  }
  if (lastName.length < 2 || lastName.length > 25) {
    showErrorMessage('Le nom doit comporter entre 2 et 25 caractères !', 'lastName');
    return false;
  }
  if (!regexNomPrenom.test(lastName)) {
    showErrorMessage('Le nom doit commencez par une lettre et ne peut pas avoir 2 caractères spéciaux qui ce suive', 'lastName');
    return false;
  }
  hideErrorMessage('lastName');
  return true;
}

function validateAddress() {
  const address = document.getElementById('address').value.trim();
  if (address === '') {
    showErrorMessage("L'adresse est obligatoire !", 'address');
    return false;
  }
  if (address.length < 2 || address.length > 50) {
    showErrorMessage('L\'adresse doit comporter entre 2 et 50 caractères !', 'address');
    return false;
  }
  // if (!adresseRegex.test(address)) {
  //   showErrorMessage('L\'adresse est invalide', 'address');
  //   return false;
  // }

  hideErrorMessage('address');
  return true;
}

function validateZip() {
  const zip = document.getElementById('zip').value.trim();
  if (zip === '') {
    showErrorMessage('Le code postal est obligatoire !', 'zip');
    return false;
  }
  if (!regexCodePostal.test(zip)) {
    showErrorMessage('Le code postal est invalide !', 'zip');
    return false;
  }

  hideErrorMessage('zip');
  return true;
}

function validateCity() {
  const city = document.getElementById('city').value.trim();
  if (city === '') {
    showErrorMessage('La ville est obligatoire !', 'city');
    return false;
  }
  if (city.length < 2 || city.length > 25) {
    showErrorMessage('La ville doit comporter entre 2 et 25 caractères !', 'city');
    return false;
  }
  if (!regexNomPrenom.test(city)) {
    showErrorMessage('La ville doit commencez par une lettre et ne peut pas avoir 2 caractères spéciaux qui ce suive', 'city');
    return false;
  }

  hideErrorMessage('city');
  return true;
}

function validatePhone() {
  const phone = document.getElementById('phone').value.trim();

  if (phone.length < 10 || phone.length > 10) {
    showErrorMessage('Le numéro de téléphone doit comporter 10 chiffres !', 'phone');
    return false;
  }
  if (!regexPhone.test(phone)) {
    showErrorMessage('Le numéro de téléphone doit comporter que des chiffres !', 'phone');
    return false;
  }
  hideErrorMessage('phone');
  return true;
}


function validateEmail() {
  const email = document.getElementById('email').value.trim();
  if (email === '') {
    showErrorMessage("L'adresse email est obligatoire !", 'email');
    return false;
  }
  if (!emailRegex.test(email)) {
    showErrorMessage("L'adresse email doit être de type @ccicampus.fr !", 'email');
    return false;
  }
  hideErrorMessage('email');
  return true;
}

function validatePassword() {
  const password = document.getElementById('your-password').value;

  if (password === '' ) {
    showErrorMessage('Le mot de passe est obligatoire', 'your-password');
    return false;
  }

  if (!passwordRegex.test(password)) {
    showErrorMessage('Le mot de passe doit comporter au moins 12 caractères dont 2 majuscules, 2 minuscules, 2 chiffres et 2 caractères spéciaux', 'your-password');
    return false;
  }

  hideErrorMessage('your-password');
  return true;
}

function validateConfirmPassword() {
  const password = document.getElementById('your-password').value;
  const confirmPassword = document.getElementById('your-confirm').value;
  if (password === '' || confirmPassword === '') {
    showErrorMessage('Les deux champs de mot de passe doivent être remplis !', 'your-confirm');
    return false;
  }

  if (password !== confirmPassword) {
    showErrorMessage('Les mots de passe ne correspondent pas !', 'your-confirm');
    return false;
  }
  hideErrorMessage('your-confirm');
  return true;

}

function validateRole() {
  let roleElements = document.getElementsByName('radio-stacked');
  let roleSelected = false;

  for (let i = 0; i < roleElements.length; i++) {
      if (roleElements[i].checked) {
          roleSelected = true;
          break;
      }
  }

  if (!roleSelected) {
    let errorMessageElement = document.querySelector('.invalid-feedback .check');
      errorMessageElement.innerHTML = 'Le choix du rôle est obligatoire !';
      return false;
  }

  return true;
}
function validateTerms() {
  let termsCheckbox = document.querySelector('input[name="CGU"]');
  
  if (!termsCheckbox.checked) {
    let errorMessageElement = document.querySelector('.invalid-feedback .terms');
      errorMessageElement.innerHTML = 'Les termes et conditions sont obligatoires !';
      return false;
  }

  return true;
}
function validateDays() {
  let daysCheckboxes = document.getElementsByName('days[]');
  let atLeastOneChecked = false;

  for (let i = 0; i < daysCheckboxes.length; i++) {
      if (daysCheckboxes[i].checked) {
          atLeastOneChecked = true;
          break;
      }
  }

  if (!atLeastOneChecked) {
    let errorMessageElement = document.querySelector('.invalid-feedback .days');
      errorMessageElement.innerHTML = 'Choisissez au moins un jour de la semaine !';
      return false;
  }

  return true;
}
function validateTime() {
  let timeStart = document.getElementById('timeStart').value;
  let timeEnd = document.getElementById('timeEnd').value;

  if (timeStart === '' || timeEnd === '') {
    let errorMessageElement = document.querySelector('.invalid-feedback .time');
      errorMessageElement.innerHTML = 'Veuillez choisir à la fois l\'heure de début et l\'heure de fin !';
      return false;
  }

  return true;
}

// Fonction pour afficher un message d'erreur
function showErrorMessage(message, fieldId) {
  const field = document.getElementById(fieldId);
  field.classList.add('is-invalid');
  const errorSpan = field.nextElementSibling;
  errorSpan.innerText = message;
  errorSpan.style.display = 'block';
}

// Fonction pour masquer le message d'erreur
function hideErrorMessage(fieldId) {
  const field = document.getElementById(fieldId);
  field.classList.remove('is-invalid');
  const errorSpan = field.nextElementSibling;
  errorSpan.innerText = '';
  errorSpan.style.display = 'none';
}

// Fonction pour valider tout le formulaire avant la soumission
function validateForm() {
  return (
    validateName() &&
    validateLastName() &&
    validateAddress() &&
    validateZip() &&
    validateCity() &&
    validateEmail() &&
    validatePhone() &&
    validatePassword() &&
    validateConfirmPassword() &&
    validateRole() &&
    validateTerms() &&
    validateDays() &&
    validateTime()
  );
}

// Attacher des gestionnaires d'événements aux champs du formulaire
document.getElementById('firstName').addEventListener('blur', validateName);
document.getElementById('lastName').addEventListener('blur', validateLastName);
document.getElementById('address').addEventListener('blur', validateAddress);
document.getElementById('zip').addEventListener('blur', validateZip);
document.getElementById('city').addEventListener('blur', validateCity);
document.getElementById('email').addEventListener('blur', validateEmail);
document.getElementById('your-password').addEventListener('blur', validatePassword);
document.getElementById('your-confirm').addEventListener('blur', validateConfirmPassword);

let roleElements = document.getElementsByName('radio-stacked');
for (let i = 0; i < roleElements.length; i++) {
  roleElements[i].addEventListener('change', validateRole);
}
document.querySelector('input[name="CGU"]').addEventListener('change', validateTerms);

var daysCheckboxes = document.getElementsByName('days[]');
for (var i = 0; i < daysCheckboxes.length; i++) {
  daysCheckboxes[i].addEventListener('change', validateDays);
}

document.getElementById('timeStart').addEventListener('blur', validateTime);
document.getElementById('timeEnd').addEventListener('blur', validateTime);


// Ajouter une gestionnaire d'événements à la soumission du formulaire
document.querySelector('form').addEventListener('submit', function (event) {
  if (!validateForm()) {
    event.preventDefault();
  }
});




// Fonction pour vider tous les champs du formulaire
function resetFormFields() {
  // Obtenez tous les champs de formulaire
  const formFields = document.querySelectorAll(".form-control");

  // Parcourez chaque champ et réinitialisez sa valeur
  formFields.forEach(function (field) {
    if (field.type === "file") {
      const newFileInput = document.createElement("input");
      newFileInput.type = "file";
      newFileInput.name = field.name;
      newFileInput.className = field.className;

      field.parentNode.replaceChild(newFileInput, field);
    } else {
      field.value = "";
    }
  });
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

function toggleCheckboxStyle(checkbox) {
  var label = checkbox.parentElement;

  if (checkbox.checked) {
    label.classList.add("checked");
  } else {
    label.classList.remove("checked");
  }
}

function runFunction() {
  // Get input values
  let address = document.querySelector("#Adresse").value;
  let zipcode = document.querySelector("#CP").value;
  let city = document.querySelector("#Ville").value;
  console.log(
    "run",
    address.trim() !== "" && zipcode.trim() !== "" && city.trim() !== ""
  );

  // Check if all inputs have values
  if (address.trim() !== "" && zipcode.trim() !== "" && city.trim() !== "") {
    // Run your desired function here

    getLocation(address, zipcode, city);
  }
}

function getLocation(address, zipcode, city) {
  // Get values from the form

  // Construct the search query
  let query = address + ", " + zipcode + ", " + city;

  // Make a request to the Nominatim API
  fetch(
    `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
      query
    )}`
  )
    .then((response) => response.json())
    .then((data) => {
      if (data && data.length > 0) {
        let latitude = data[0].lat;
        let longitude = data[0].lon;
        document.getElementById("lat").setAttribute("value", latitude);
        document.getElementById("lon").setAttribute("value", longitude);
      } else {
        console.log("Location not found");
        document.getElementById("lat").setAttribute("value", "error");
        document.getElementById("lon").setAttribute("value", "error");
      }
    })
    .catch((error) => {
      console.error("Error fetching location:", error);
    });
}

document.querySelector("#Adresse").addEventListener("input", runFunction);
document.querySelector("#CP").addEventListener("input", runFunction);
document.querySelector("#Ville").addEventListener("input", runFunction);