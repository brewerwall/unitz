<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Gravity;

final class GravityTest extends TestCase
{
    const TEST_PLATO = 12.1;
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

    public function testSetSpecificGravityWillReturnPlatoWithGetValueAndDefaultPreferences(): void
    {
        $gravity = new Gravity(specificGravity: self::TEST_SPECIFIC_GRAVITY);
        $actual = $gravity->getValue();
        $expected = self::TEST_PLATO;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSpecificGravityWillReturnPlatoWithGetPlato(): void
    {
        $gravity = new Gravity(specificGravity: self::TEST_SPECIFIC_GRAVITY);
        $actual = $gravity->getPlato();
        $expected = self::TEST_PLATO;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSpecificGravityWillReturnSpecificGravityWithGetSpecificGravity(): void
    {
        $gravity = new Gravity(specificGravity: self::TEST_SPECIFIC_GRAVITY);
        $actual = $gravity->getSpecificGravity();
        $expected = self::TEST_SPECIFIC_GRAVITY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSpecificGravityWillReturnBrixWithGetBrix(): void
    {
        $gravity = new Gravity(specificGravity: self::TEST_SPECIFIC_GRAVITY);
        $actual = $gravity->getBrix();
        $expected = self::TEST_BRIX;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBrixWillReturnPlatoWithGetValueAndDefaultPreferences(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getValue();
        $expected = self::TEST_PLATO;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBrixWillReturnPlatoWithGetPlato(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getPlato();
        $expected = self::TEST_PLATO;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBrixWillReturnSpecificGravityWithGetSpecificGravity(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getSpecificGravity();
        $expected = self::TEST_SPECIFIC_GRAVITY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBrixWillReturnBrixWithGetBrix(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getBrix();
        $expected = self::TEST_BRIX;

        $this->assertEquals($expected, $actual);
    }
}