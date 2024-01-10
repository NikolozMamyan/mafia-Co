<?php

namespace models;

require_once(__DIR__ . '/../Model.php');
require_once('Db.php');

use \PDO;
use \models\DB;

class MapDAL extends Model
{
    /**
     * @param $lat
     * @param $lon
     * @param $distance
     * @return bool|array
     */
    static public function getCloseUsers($lat, $lon, $distance): bool|array
    {
        // Initialisation de la connexion
        $db = new DB();

        // Validation des données d'entrée
        $lat = filter_var($lat, FILTER_VALIDATE_FLOAT);
        $lon = filter_var($lon, FILTER_VALIDATE_FLOAT);
        $distance = filter_var($distance, FILTER_VALIDATE_FLOAT);

        if ($lat === false || $lon === false || $distance === false) {
            return false;
        }

        // petite marge d'erreur
        $distanceAdjustment = 1 / Map::calculerDistanceLongitude($lat);
        $distance = ($distance + 1) * $distanceAdjustment;

        $q = $db->prepare("SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, latitude, longitude FROM utilisateurs "
            . "JOIN points ON utilisateurs.idPoint = points.idPoint "
            . "WHERE (points.latitude BETWEEN :lat1 AND :lat2) "
            . "AND (points.longitude BETWEEN :lon1 AND :lon2) "
            . "AND idRole != 1 AND compteActif = 1");
        $q->bindValue(':lat1', strval($lat - $distance), PDO::PARAM_STR);
        $q->bindValue(':lat2', strval($lat + $distance), PDO::PARAM_STR);
        $q->bindValue(':lon1', strval($lon - $distance), PDO::PARAM_STR);
        $q->bindValue(':lon2', strval($lon + $distance), PDO::PARAM_STR);

        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
