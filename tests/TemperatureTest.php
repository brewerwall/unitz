<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Temperature;

final class TemperatureTest extends TestCase
{
    public const TEST_CELSIUS = 23.89;
    public const TEST_FAHRENHEIT = 75.002;

    public function testSetFahrenheitWillReturnFahrenheitWithGetValueAndDefaultPreferences(): void
    {
        $gravity = new Temperature(fahrenheit: self::TEST_FAHRENHEIT);
        $actual = $gravity->getValue();
        $expected = self::TEST_FAHRENHEIT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFahrenheitWillReturnFahrenheitWithGetFahrenheit(): void
    {
        $gravity = new Temperature(fahrenheit: self::TEST_FAHRENHEIT);
        $actual = $gravity->getFahrenheit();
        $expected = self::TEST_FAHRENHEIT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFahrenheitWillReturnCelsiusWithGetCelsius(): void
    {
        $gravity = new Temperature(fahrenheit: self::TEST_FAHRENHEIT);
        $actual = $gravity->getCelsius();
        $expected = self::TEST_CELSIUS;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCelsiusWillReturnFahrenheitWithGetValueAndDefaultPreferences(): void
    {
        $gravity = new Temperature(celsius: self::TEST_CELSIUS);
        $actual = $gravity->getValue();
        $expected = self::TEST_FAHRENHEIT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCelsiusWillReturnFahrenheitWithGetFahrenheit(): void
    {
        $gravity = new Temperature(celsius: self::TEST_CELSIUS);
        $actual = $gravity->getFahrenheit();
        $expected = self::TEST_FAHRENHEIT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCelsiusWillReturnCelsiusWithGetCelsius(): void
    {
        $gravity = new Temperature(celsius: self::TEST_CELSIUS);
        $actual = $gravity->getCelsius();
        $expected = self::TEST_CELSIUS;

        $this->assertEquals($expected, $actual);
    }

    public function testWillThrowExceptionWithNoValuesSet(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Temperature type can be set at a time.');

        new Temperature();
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Temperature type can be set at a time.');

        new Temperature(celsius: self::TEST_CELSIUS, fahrenheit: self::TEST_FAHRENHEIT);
    }
}