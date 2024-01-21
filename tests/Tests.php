<?php

// command is ./vendor/bin/phpunit tests/Tests.php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Map;

class Tests extends TestCase
{
    /** @test */
    public function haversineDistanceListTest(): void
    {
        TestCase::assertEquals(
            Map::haversineDistanceList([], [], 10),
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
