<?php

namespace Unitz\Tests\Rate;

use PHPUnit\Framework\TestCase;
use Unitz\Rate\Boil;
use Unitz\Time;
use Unitz\Volume;

class BoilTest extends TestCase
{
    public function testFlowReturnsCorrectValue(): void
    {
        $boil = new Boil(new Volume(gallon: 3), new Time(minute: 1));
        $this->assertEquals(new Volume(gallon: 3), $boil->getGallonsPerMinute());
    }
}