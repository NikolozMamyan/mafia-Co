<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer/Modifier Trajet</title>
</head>
<body>

<h1>Créer/Modifier Trajet</h1>

<form action="TraitementTrajetsDashboard.php" method="post">
    <!-- Champs pour le formulaire -->
    <label for="depart">Adresse de départ :</label>
    <input type="text" id="depart" name="depart" required>

    <label for="destination">Adresse d'arrivée :</label>
    <input type="text" id="destination" name="destination" required>

    <label for="debut_cours">Début du cours :</label>
    <input type="time" id="debut_cours" name="debut_cours" required>

    <label for="fin_cours">Fin du cours :</label>
    <input type="time" id="fin_cours" name="fin_cours" required>

    <label for="nbr_places_dispo">Nombre de places disponibles :</label>
    <input type="number" id="nbr_places_dispo" name="nbr_places_dispo" required>

    <label for="info_complementaire">Informations complémentaires :</label>
    <textarea id="info_complementaire" name="info_complementaire"></textarea>

    <!-- Champ caché pour identifier si c'est une création ou une modification -->
    <input type="hidden" name="action" value="creer_modifier">


    <input type="submit" value="Enregistrer">
</form>

</body>
</html>
