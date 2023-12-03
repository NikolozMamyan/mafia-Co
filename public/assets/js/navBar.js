document.addEventListener("DOMContentLoaded", function () {
    function handleMediaChange(mql) {
      if (mql.matches) {
        // Mode mobile
        document.getElementById("notification").style.display = "none";
        document.getElementById("recherche").style.display = "block";

        document.getElementById("rechercheLink").addEventListener("click", function (e) {
          e.preventDefault();
        });

        // clic sur le lien de notification
        document.getElementById("notificationLink").addEventListener("click", function (e) {
          e.preventDefault();
          // Masquer la section de recherche et afficher la section de notification
          document.getElementById("recherche").style.display = "none";
          document.getElementById("notification").style.display = "block";
        });
      } else {
        // Mode bureau
        // Afficher les sections de recherche et de notification au chargement de la page
        document.getElementById("recherche").style.display = "block";
        document.getElementById("notification").style.display = "block";

        document.getElementById("rechercheLink").addEventListener("click", function (e) {
          e.preventDefault();
          // Masquer la section de notification et afficher la section de recherche
          document.getElementById("notification").style.display = "none";
          document.getElementById("recherche").style.display = "block";
        });

        document.getElementById("notificationLink").addEventListener("click", function (e) {
          e.preventDefault();
          // Masquer la section de recherche et afficher la section de notification
          document.getElementById("recherche").style.display = "none";
          document.getElementById("notification").style.display = "block";
        });
      }
    }

    
    const mediaQuery = window.matchMedia("(max-width: 768px)");
    handleMediaChange(mediaQuery);
    mediaQuery.addEventListener("change", function (e) {
      handleMediaChange(e.target);
    });
  });