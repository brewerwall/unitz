<?php

namespace Unitz\Tests\Calculate;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Calculate\Water;
use Unitz\Rate\Boil;
use Unitz\Time;
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

    public function testBoilOffVolumeReturnsCorrectVolume(): void
    {
        $boilRate = new Boil(new Volume(gallon: 2), new Time(hour: 1));
        $time = new Time(hour: 1.5);
        $expected = new Volume(gallon: 3);

        $actual = Water::boilOffVolume($boilRate, $time);
        $this->assertEquals($expected, $actual);
    }

    public function testPostBoilVolumeReturnsCorrectVolume(): void
    {
        $preBoilVolume = new Volume(gallon: 10);
        $boilRate = new Boil(new Volume(gallon: 2), new Time(hour: 1));
        $time = new Time(hour: 1.5);
        $expected = new Volume(gallon: 7);

        $actual = Water::postBoilVolume($preBoilVolume, $boilRate, $time);
        $this->assertEquals($expected, $actual);
    }
}