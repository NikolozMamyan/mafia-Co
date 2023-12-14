<?php
require_once '../models/map.php';

$map = new Map();

$myPoints = [
    ['lat' => 48.5549148, 'lon' => 7.7449707],
];

$usersPoints = [
    ['lat' => 48.5549148, 'lon' => 7.45483269],
    ['lat' => 48.55465, 'lon' => 7.448275],
    ['lat' => 48.5582674, 'lon' => 7.425427],
];

$distances = $map->haversineDistanceList($myPoints, $usersPoints);

foreach ($distances as $key => $value) {
    echo ($value . '<br>');
}

echo ('<br>---<br><br>');


$result = $map->getClosestPoints($distances, 5.5);

foreach ($result as $key => $value) {
    echo ($value . '<br>');
}

foreach ($map->getCloseUsers(48.5549148, 7.7449707, 22) as $user) {
    var_dump($user);
    echo '<br><br>';
}
