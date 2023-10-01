<?php

namespace Tests\Calculate;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Calculate\Water;
use Unitz\Volume;
use Unitz\Weight;

class WaterTest extends TestCase
{
    public function testPartsPerMillionCalculatesCorrectly(): void
    {
        $water = new Volume(milliliter: 500);
        $substance = new Weight(gram: 5);
        $expected = 10000;

        $actual = Water::partsPerMillion($substance, $water);
        $this->assertEquals($expected, $actual);
    }

    public function testPartsPerMillionThrowsInvalidArgumentExceptionWithZeroWater(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Water volume cannot be zero.');

        $water = new Volume(milliliter: 0);
        $substance = new Weight(gram: 5);

        Water::partsPerMillion($substance, $water);
    }
}