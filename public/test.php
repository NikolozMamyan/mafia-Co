<?php
require_once '../models/map.php';

$map = new Map();

$myPoints = [
    ['latitude' => 48.5549148, 'longitude' => 7.7449707],
];

$close = $map->getCloseUsers(48.5549148, 7.7449707, 22);

foreach ($close as $user) {
    var_dump($user);
    echo '<br><br>';
}

echo ('<br>---<br><br>');

$distances = $map->haversineDistanceList($close, $myPoints, 10);

foreach ($distances as $key => $value) {
    echo ($value . '<br>');
}
