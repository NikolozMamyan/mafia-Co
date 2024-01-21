<?php

// command is ./vendor/bin/phpunit tests/MapTests.php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Map;

class MapTests extends TestCase
{
    /** @test */
    public function haversineDistanceListTest(): void
    {
        TestCase::assertEquals(
            Map::haversineDistanceList([], [], 10.5),
            []
        );
        TestCase::assertEquals(
            Map::haversineDistanceList([], [], 0),
            []
        );
        TestCase::assertEquals(
            Map::haversineDistanceList([], [], -1),
            []
        );

        TestCase::assertEquals(
            Map::haversineDistanceList([['latitude' => 48.5549148, 'longitude' => 7.7449707]], [['latitude' => 48.5549148, 'longitude' => 7.7449707]], 1),
            [
                0 => ["distance" => 0, "idUtilisateur" => null]
            ]
        );

        TestCase::assertEquals(
            Map::haversineDistanceList([['latitude' => 48.5549148, 'longitude' => 7.7449707]], [['latitude' => 49.5549148, 'longitude' => 7.7449707]], 1),
            []
        );

        TestCase::assertEquals(
            Map::haversineDistanceList([['latitude' => 48.5549148, 'longitude' => 7.7449707]], [['latitude' => 49.5549148, 'longitude' => 7.7449707]], 100),
            []
        );

        TestCase::assertEquals(
            Map::haversineDistanceList([['latitude' => 48.5549148, 'longitude' => 7.7449707]], [['latitude' => 49.5549148, 'longitude' => 7.7449707]], 125),
            [
                0 => ["distance" => 111.19492664455889, "idUtilisateur" => null]
            ]
        );
    }

    /** @test */
    public function calculerDistanceLongitudeTest(): void
    {
        TestCase::assertEquals(
            Map::calculerDistanceLongitude(15.5),
            107.15081755699572
        );
        TestCase::assertEquals(
            Map::calculerDistanceLongitude(0),
            111.19492664455873
        );
        TestCase::assertEquals(
            Map::calculerDistanceLongitude(-15.5),
            107.15081755699572
        );

        TestCase::assertEquals(
            Map::calculerDistanceLongitude('-15.5'),
            107.15081755699572
        );
    }
}
