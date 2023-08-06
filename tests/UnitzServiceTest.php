<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\UnitzService;

final class UnitzServiceTest extends TestCase
{
    private function makeUnitService(array $preferences = []): UnitzService
    {
        return new UnitzService($preferences);
    }

    public function testMakeColorWillReturnColorWithPreference(): void
    {
        $ebc = 12;
        $color = $this->makeUnitService(['Color' => 'Ebc'])->makeColor(ebc: $ebc);
        $expected = $ebc;
        $actual = $color->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeGravityWillReturnGravityWithPreference(): void
    {
        $specificGravity = 1.048;
        $gravity = $this->makeUnitService(['Gravity' => 'SpecificGravity'])->makeGravity(
            specificGravity: $specificGravity
        );
        $expected = $specificGravity;
        $actual = $gravity->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakePressureWillReturnPressureWithPreference(): void
    {
        $bar = 3;
        $pressure = $this->makeUnitService(['Pressure' => 'Bar'])->makePressure(bar: $bar);
        $expected = $bar;
        $actual = $pressure->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeTemperatureWillReturnTemperatureWithPreference(): void
    {
        $celsius = 22;
        $temperature = $this->makeUnitService(['Temperature' => 'Celsius'])->makeTemperature(
            celsius: $celsius
        );
        $expected = $celsius;
        $actual = $temperature->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeVolumeWillReturnVolumeWithPreference(): void
    {
        $liter = 19;
        $volume = $this->makeUnitService(['Volume' => 'Liter'])->makeVolume(liter: $liter);
        $expected = $liter;
        $actual = $volume->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeWeightWillReturnWeightWithPreference(): void
    {
        $kilogram = 6;
        $weight = $this->makeUnitService(['Weight' => 'Kilogram'])->makeWeight(kilogram: $kilogram);
        $expected = $kilogram;
        $actual = $weight->getValue();
        $this->assertEquals($expected, $actual);
    }
}