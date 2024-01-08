document.addEventListener("DOMContentLoaded", function () {
    const fleche = document.querySelector('.fleche');
    const depInp = document.getElementById('depart');
    const arrInp = document.getElementById('arrive');
    const formGroup = document.querySelector('.form__group');
    
  
    if (fleche) {
      fleche.addEventListener("click", element);
    }
  
    function element() {
        console.log("Clic sur la flèche !");
        
        // Échange des valeurs des champs de départ et d'arrivée
        const tempValue = depInp.value;
        depInp.value = arrInp.value;
        arrInp.value = tempValue;
      
        // Ajoute une classe pour l'effet visuel
        formGroup.classList.add('swap');
      
        // Retire la classe après un délai pour l'effet visuel
      }
      
      
  });
  