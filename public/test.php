<?php
require_once '../distanceCalculator.php';

$calculator = new DistanceCalculator();

$myPoints = [
    ['lat' => 48.5549148, 'lon' => 7.7449707],
    ['lat' => 49.5549148, 'lon' => 7.7449707],
    // Ajoutez d'autres points au besoin
];

$usersPoints = [
    ['lat' => 48.3825041, 'lon' => 7.6978193],
    ['lat' => 48.3825041, 'lon' => 6.6978193], 
    ['lat' => 48.3825041, 'lon' => 8.6978193], 
    // Ajoutez d'autres points au besoin
];

$distances = $calculator->haversineDistanceList($myPoints, $usersPoints);

foreach ($distances as $key => $value) {
    echo($value . '<br>');
}

?>