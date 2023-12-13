<?php


class distanceCalculator
{
    /**
     * @param array $myPoints points sur le trajet de la personne
     * @param array $usersPoints points des utilisateurs a vérifier
     * @return array distance entre les points
     */
    public function haversineDistanceList(array $myPoints, array $usersPoints): array
    {
        $distances = [];

        foreach ($myPoints as $myLatLon) {
            foreach ($usersPoints as $userLatLon) {
                $lat1 = $myLatLon['lat'];
                $lon1 = $myLatLon['lon'];
    
                $lat2 = $userLatLon['lat'];
                $lon2 = $userLatLon['lon'];
    
                // Convertir les latitudes et longitudes de degrés à radians
                $lat1 = deg2rad($lat1);
                $lon1 = deg2rad($lon1);
                $lat2 = deg2rad($lat2);
                $lon2 = deg2rad($lon2);
    
                // Calcul des différences de latitude et de longitude
                $dlat = $lat2 - $lat1;
                $dlon = $lon2 - $lon1;
    
                // Formule haversine
                $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
                $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
                // Rayon de la Terre en kilomètres (approximatif)
                $radius = 6371;
    
                // Calcul de la distance
                $distance = $radius * $c;
    
                // Ajouter la distance à la liste des distances
                $distances[] = $distance;
            }
        }
        return $distances;
    }
}

