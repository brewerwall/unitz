<?php

namespace Tests\Calculate;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Unitz\Calculate\Beer;
use Unitz\Color;
use Unitz\Gravity;
use Unitz\Temperature;
use Unitz\Time;
use Unitz\Volume;
use Unitz\Weight;

final class BeerTest extends TestCase
{
    public function testStandardReferenceMethodCalculatesCorrectly(): void
    {
        $weight = new Weight(pound: 7);
        $color = new Color(lovibond: 5);
        $volume = new Volume(gallon: 5);
        $expected = new Color(srm: 5.668651803424155);
        $actual = Beer::standardReferenceMethod($weight, $color, $volume);
        $this->assertEquals($expected, $actual);
    }

    public function testStandardReferenceMethodThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Volume cannot be zero');

        $weight = new Weight(pound: 7);
        $color = new Color(lovibond: 5);
        $volume = new Volume(gallon: 0);
        Beer::standardReferenceMethod($weight, $color, $volume);
    }

    public function testMaltColorUnitCalculatesCorrectly(): void
    {
        $weight = new Weight(pound: 5);
        $color = new Color(lovibond: 5);
        $volume = new Volume(gallon: 5);
        $expected = 5;
        $actual = Beer::maltColorUnit($weight, $color, $volume);
        $this->assertEquals($expected, $actual);
    }

    public function testMaltColorUnitThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Volume cannot be zero');

        $weight = new Weight(pound: 7);
        $color = new Color(lovibond: 5);
        $volume = new Volume(gallon: 0);
        Beer::maltColorUnit($weight, $color, $volume);
    }

    public function testInternationalBitternessUnitsCalculatesCorrectly(): void
    {
        $alphaAcid = 6.4;
        $weight = new Weight(ounce: 1.5);
        $time = new Time(minute: 60);
        $gravity = new Gravity(specificGravity: 1.080);
        $volume = new Volume(gallon: 5);
        $expected = 25.365869680614512;
        $actual = Beer::internationalBitternessUnits($alphaAcid, $weight, $time, $gravity, $volume);
        $this->assertEquals($expected, $actual);
    }

    public function testInternationalBitternessUnitsThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Volume cannot be zero');

        $alphaAcid = 6.4;
        $weight = new Weight(ounce: 1.5);
        $time = new Time(minute: 60);
        $gravity = new Gravity(specificGravity: 1.080);
        $volume = new Volume(gallon: 0);
        Beer::internationalBitternessUnits($alphaAcid, $weight, $time, $gravity, $volume);
    }

    public function testAlphaAcidUnitCalculatesCorrectly(): void
    {
        $alphaAcid = 6.4;
        $weight = new Weight(ounce: 1.5);
        $expected = 9.600000000000001;
        $actual = Beer::alphaAcidUnit($alphaAcid, $weight);
        $this->assertEquals($expected, $actual);
    }

    public function testHopUtilizationCalculatesCorrectly(): void
    {
        $time = new Time(minute: 120);
        $gravity = new Gravity(specificGravity: 1.030);
        $expected = 0.30113013986478654;
        $actual = Beer::hopUtilization($time, $gravity);
        $this->assertEquals($expected, $actual);
    }

    public function testCaloriesCalculatesCorrectly(): void
    {
        $originalGravity = new Gravity(specificGravity: 1.070);
        $finalGravity = new Gravity(specificGravity: 1.015);
        $expected = 235.00333730524883;
        $actual = Beer::calories($originalGravity, $finalGravity);
        $this->assertEquals($expected, $actual);
    }

    public function testAlcoholByWeightCalculatesCorrectly(): void
    {
        $originalGravity = new Gravity(specificGravity: 1.055);
        $finalGravity = new Gravity(specificGravity: 1);
        $expected = 5.782388748950455;
        $actual = Beer::alcoholByWeight($originalGravity, $finalGravity);
        $this->assertEquals($expected, $actual);
    }

    public function testAlcoholByWeightThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Final Gravity cannot be zero');

        $originalGravity = new Gravity(specificGravity: 1.055);
        $finalGravity = new Gravity(specificGravity: 0);
        Beer::alcoholByWeight($originalGravity, $finalGravity);
    }

    public function testAlcoholByVolumeCalculatesCorrectly(): void
    {
        $originalGravity = new Gravity(specificGravity: 1.055);
        $finalGravity = new Gravity(specificGravity: 1);
        $expected = 7.319479429051208;
        $actual = Beer::alcoholByVolume($originalGravity, $finalGravity);
        $this->assertEquals($expected, $actual);
    }

    public function testRealExtractCalculatesCorrectly(): void
    {
        $originalGravity = new Gravity(specificGravity: 1.070);
        $finalGravity = new Gravity(specificGravity: 1.015);
        $expected = 6.218109887422394;
        $actual = Beer::realExtract($originalGravity, $finalGravity);
        $this->assertEquals($expected, $actual);
    }

    public function testAttenuationCalculatesCorrectly(): void
    {
        $originalGravity = new Gravity(specificGravity: 1.054);
        $finalGravity = new Gravity(specificGravity: 1.012);
        $expected = 0.7777777777777778;
        $actual = Beer::attenuation($originalGravity, $finalGravity);
        $this->assertEquals($expected, $actual);
    }

    public function testAttenuationThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Original Gravity cannot be less than 1.0');

        $originalGravity = new Gravity(specificGravity: 1);
        $finalGravity = new Gravity(specificGravity: 1.012);
        Beer::attenuation($originalGravity, $finalGravity);
    }

    public function testGravityCorrectionCalculatesCorrectly(): void
    {
        $temperature = new Temperature(fahrenheit: 100.4);
        $specificGravity = new Gravity(specificGravity: 1.050);
        $calibrateTemperature = new Temperature(fahrenheit: 60);
        $expected = 1.0562227410996516;
        $actual = Beer::gravityCorrection($temperature, $specificGravity, $calibrateTemperature);
        $this->assertEquals($expected, $actual);
    }
}