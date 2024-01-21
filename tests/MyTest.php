<?php

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testAddition()
    {
        $result = 1 + 1;
        $this->assertEquals(2, $result);
    }
}