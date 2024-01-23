<?php

require_once __DIR__ . '/../helpers/class/Map.php';



$distance = 10;
$myPoints = [
    ['latitude' => 48.5549148, 'longitude' => 7.7449707],
];

echo ('<br>---<br><br>');

var_dump(Map::haversineDistanceList([['latitude' => 48.5549148, 'longitude' => 7.7449707]], [['latitude' => 49.5549148, 'longitude' => 7.7449707]], 3000));
