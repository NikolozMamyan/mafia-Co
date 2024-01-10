<?php

use models\Map;

require_once '../models/Map/Map.php';

$map = new Map();


$distance = 10;
$myPoints = [
    ['latitude' => 48.5549148, 'longitude' => 7.7449707],
];

$close = $map->getCloseUsers(48.5549148, 7.7449707, $distance);

foreach ($close as $user) {
    var_dump($user);
    echo '<br><br>';
}

echo ('<br>---<br><br>');

$distances = $map->haversineDistanceList($myPoints, $close, $distance);

foreach ($distances as $key => $value) {
    echo ($value['idUtilisateur'] . ' -> ' . $value['distance'] . ' km' . '<br>');
}
