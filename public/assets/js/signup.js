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
        document.getElementById("lat").setAttribute("value", -1);
        document.getElementById("lon").setAttribute("value", -1);
      }
    })
    .catch((error) => {
      console.error("Error fetching location:", error);
    });
}

document.querySelector("#Adresse").addEventListener("input", runFunction);
document.querySelector("#CP").addEventListener("input", runFunction);
document.querySelector("#Ville").addEventListener("input", runFunction);
