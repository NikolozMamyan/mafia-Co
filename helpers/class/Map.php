<?php

class Map
{
    const EARTH_RADIUS = 6371;
    const EARTH_CIRCUMFERENCE = self::EARTH_RADIUS * 2 * M_PI;

    /**
     * @param float $latitudeDegres
     * @return float|int valeur de 1 degre de longitude a une latitude donnée
     */
    static function calculerDistanceLongitude(float $latitudeDegres): float|int
    {
        // Convertir la latitude en radians
        $latitudeRadians = $latitudeDegres * (M_PI / 180);

        // Calcul de la distance en kilomètres pour un degré de longitude à cette latitude
        return (self::EARTH_CIRCUMFERENCE * cos($latitudeRadians)) / 360;
    }


    /**
     * @param array $myPoints points sur le trajet de la personne
     * @param array $usersPoints points des utilisateurs a vérifier
     * @return array distance entre les points
     */
    public static function haversineDistanceList(array $myPoints, array $usersPoints, float $maxDistance): array
    {
        $distances = [];
        if (!$maxDistance) {
            $maxDistance = 10000;
        }

        foreach ($myPoints as $myLatLon) {
            foreach ($usersPoints as $currUser) {
                // Convertir degres en radiants
                $lat1 = deg2rad($myLatLon['latitude']);
                $lon1 = deg2rad($myLatLon['longitude']);

                $lat2 = deg2rad($currUser['latitude']);
                $lon2 = deg2rad($currUser['longitude']);

                // Calcul des différences de latitude et de longitude
                $dlat = $lat2 - $lat1;
                $dlon = $lon2 - $lon1;

                // Formule haversine
                $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
                $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

                // Calcul de la distance
                $distance = self::EARTH_RADIUS * $c;

                if ($distance < $maxDistance) {
                    // Ajouter la distance à la liste des distances
                    array_push($distances, ['distance' => $distance, 'idUtilisateur' => $currUser['idUtilisateur']]);
                }
            }
        }
        return $distances;
    }

    /**
     * @param $lat
     * @param $lon
     * @param $distance
     * @return bool|array
     */
    static public function getCloseUsers($lat, $lon, $distance): bool|array
    {
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

        return DB::fetch(
            "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, latitude, longitude FROM utilisateurs "
                . "JOIN points ON utilisateurs.idPoint = points.idPoint "
                . "WHERE (points.latitude BETWEEN :lat1 AND :lat2) "
                . "AND (points.longitude BETWEEN :lon1 AND :lon2) "
                . "AND idRole != 1 AND compteActif = 1",
            [
                'lat1' => strval($lat - $distance),
                'lat2' => strval($lat + $distance),
                'lon1' => strval($lon - $distance),
                'lon2' => strval($lon + $distance),
            ]
        );
    }
}
