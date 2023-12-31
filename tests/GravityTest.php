<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Gravity;

final class GravityTest extends TestCase
{
    public const TEST_PLATO = 12.155178526444615;
    public const TEST_SPECIFIC_GRAVITY = 1.0490215002286123;
    public const TEST_BRIX = 12.154604415669382;

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
        $expected = 1.0490308268117239; // TODO: This is a slightly different value than plato -> SG conversion

        $this->assertEquals($expected, $actual);
    }

    public function testSetPlatoWillReturnBrixWithGetBrix(): void
    {
        $gravity = new Gravity(plato: self::TEST_PLATO);
        $actual = $gravity->getBrix();
        $expected = 12.156821583620058; // TODO: this is a slightly different value than plato -> brix conversion;

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

        // Due to differences in equations between brix and SG conversions there are differences at higher decimal places
        $this->assertEquals(round($expected, 2), round($actual, 2));
    }

    public function testSetBrixWillReturnPlatoWithGetPlato(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getPlato();
        $expected = self::TEST_PLATO;

        // Due to differences in equations between brix and SG conversions there are differences at higher decimal places
        $this->assertEquals(round($expected, 2), round($actual, 2));
    }

    public function testSetBrixWillReturnSpecificGravityWithGetSpecificGravity(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getSpecificGravity();
        $expected = self::TEST_SPECIFIC_GRAVITY;

        // Due to differences in equations between brix and SG conversions there are differences at higher decimal places
        $this->assertEquals(round($expected, 4), round($actual, 4));
    }

    public function testSetBrixWillReturnBrixWithGetBrix(): void
    {
        $gravity = new Gravity(brix: self::TEST_BRIX);
        $actual = $gravity->getBrix();
        $expected = self::TEST_BRIX;

        $this->assertEquals($expected, $actual);
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Gravity type can be set at a time.');

        new Gravity(plato: self::TEST_PLATO, specificGravity: self::TEST_SPECIFIC_GRAVITY);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $gravity = new Gravity(userValue: self::TEST_BRIX, preferences: ['Gravity' => 'Brix']);
        $actual = $gravity->getValue();
        $expected = self::TEST_BRIX;

        $this->assertEquals($expected, $actual);
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $gravity = new Gravity(userValue: self::TEST_BRIX, preferences: ['Gravity' => 'Brix']);
        $actual = $gravity->getBrix();
        $expected = self::TEST_BRIX;

        $this->assertEquals($expected, $actual);
    }
}