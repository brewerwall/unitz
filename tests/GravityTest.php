<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Gravity;

final class GravityTest extends TestCase
{
    const TEST_PLATO = 12;
    const TEST_SPECIFIC_GRAVITY = 1.049;
    const TEST_BRIX = 12.15;

    public function testSetPlatoWillReturnPlatoWithGetValueAndDefaultPreferences(): void
    {
        $gravity = new Gravity(plato: self::TEST_PLATO);
        $actual = $gravity->getValue();
        $expected = self::TEST_PLATO;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPlatoWillReturnPlatoWithGetPlato(): void
    {
        $gravity = new Gravity(plato: self::TEST_PLATO);
        $actual = $gravity->getPlato();
        $expected = self::TEST_PLATO;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPlatoWillReturnSpecificGravityWithGetSpecificGravity(): void
    {
        $gravity = new Gravity(plato: self::TEST_PLATO);
        $actual = $gravity->getSpecificGravity();
        $expected = self::TEST_SPECIFIC_GRAVITY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPlatoWillReturnBrixWithGetBrix(): void
    {
        $gravity = new Gravity(plato: self::TEST_PLATO);
        $actual = $gravity->getBrix();
        $expected = self::TEST_BRIX;

        $this->assertEquals($expected, $actual);
    }
}