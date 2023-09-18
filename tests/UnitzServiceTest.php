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

    public function testMakeColorWillSetColorWithPreferenceAndReturnTheSame(): void
    {
        $ebc = 12;
        $color = $this->makeUnitService(['Color' => 'Ebc'])->makeColor(userValue: $ebc);
        $expected = $ebc;
        $actual = $color->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeColorWillSetColorWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $ebc = 12;
        $newEbc = 14;
        $color = $this->makeUnitService(['Color' => 'Ebc'])->makeColor(userValue: $ebc);
        $color->setValue($newEbc);
        $expected = $newEbc;
        $actual = $color->getEbc();
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

    public function testMakeGravityWillSetGravityWithPreferenceAndReturnTheSame(): void
    {
        $brix = 12;
        $gravity = $this->makeUnitService(['Gravity' => 'Brix'])->makeGravity(userValue: $brix);
        $expected = $brix;
        $actual = $gravity->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeGravityWillSetGravityWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $brix = 12;
        $newBrix = 14;
        $gravity = $this->makeUnitService(['Gravity' => 'Brix'])->makeGravity(userValue: $brix);
        $gravity->setValue($newBrix);
        $expected = $newBrix;
        $actual = $gravity->getBrix();
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

    public function testMakePressureWillSetPressureWithPreferenceAndReturnTheSame(): void
    {
        $bar = 3.5;
        $pressure = $this->makeUnitService(['Pressure' => 'Bar'])->makePressure(userValue: $bar);
        $expected = $bar;
        $actual = $pressure->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakePressureWillSetPressureWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $bar = 3.5;
        $newBar = 2.9;
        $pressure = $this->makeUnitService(['Pressure' => 'Bar'])->makePressure(userValue: $bar);
        $pressure->setValue($newBar);
        $expected = $newBar;
        $actual = $pressure->getBar();
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

    public function testMakeTemperatureWillSetTemperatureWithPreferenceAndReturnTheSame(): void
    {
        $celsius = 36;
        $temperature = $this->makeUnitService(['Temperature' => 'Celsius'])->makeTemperature(userValue: $celsius);
        $expected = $celsius;
        $actual = $temperature->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeTemperatureWillSetTemperatureWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $celsius = 36;
        $newCelsius = 39.2;
        $temperature = $this->makeUnitService(['Temperature' => 'Celsius'])->makeTemperature(userValue: $celsius);
        $temperature->setValue($newCelsius);
        $expected = $newCelsius;
        $actual = $temperature->getCelsius();
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

    public function testMakeVolumeWillSetVolumeWithPreferenceAndReturnTheSame(): void
    {
        $hectoliter = 2.7;
        $volume = $this->makeUnitService(['Volume' => 'Hectoliter'])->makeVolume(userValue: $hectoliter);
        $expected = $hectoliter;
        $actual = $volume->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeVolumeWillSetVolumeWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $hectoliter = 2.7;
        $newHectoliter = 3.2;
        $volume = $this->makeUnitService(['Volume' => 'Hectoliter'])->makeVolume(userValue: $hectoliter);
        $volume->setValue($newHectoliter);
        $expected = $newHectoliter;
        $actual = $volume->getHectoliter();
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

    public function testMakeWeightWillSetWeightWithPreferenceAndReturnTheSame(): void
    {
        $gram = 56;
        $weight = $this->makeUnitService(['Weight' => 'Gram'])->makeWeight(userValue: $gram);
        $expected = $gram;
        $actual = $weight->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeWeightWillSetWeightWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $gram = 56;
        $newGram = 96;
        $weight = $this->makeUnitService(['Weight' => 'Gram'])->makeWeight(userValue: $gram);
        $weight->setValue($newGram);
        $expected = $newGram;
        $actual = $weight->getGram();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeTimeWillReturnTimeWithPreference(): void
    {
        $second = 6;
        $time = $this->makeUnitService(['Time' => 'Second'])->makeTime(second: $second);
        $expected = $second;
        $actual = $time->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeTimeWillSetTimeWithPreferenceAndReturnTheSame(): void
    {
        $hour = 56;
        $time = $this->makeUnitService(['Time' => 'Hour'])->makeTime(userValue: $hour);
        $expected = $hour;
        $actual = $time->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeTimeWillSetTimeWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $hour = 56;
        $newHour = 96;
        $time = $this->makeUnitService(['Time' => 'Hour'])->makeTime(userValue: $hour);
        $time->setValue($newHour);
        $expected = $newHour;
        $actual = $time->getHour();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeProofWillReturnProofWithPreference(): void
    {
        $proof = 60;
        $distillate = $this->makeUnitService(['Distillate' => 'Proof'])->makeDistillate(
            proof: $proof
        );
        $expected = $proof;
        $actual = $distillate->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeProofWillSetProofWithPreferenceAndReturnTheSame(): void
    {
        $proof = 60;
        $distillate = $this->makeUnitService(['Distillate' => 'Proof'])->makeDistillate(userValue: $proof);
        $expected = $proof;
        $actual = $distillate->getValue();
        $this->assertEquals($expected, $actual);
    }

    public function testMakeProofWillSetProofWithPreferenceAndNewSetValueAndReturnTheSame(): void
    {
        $proof = 60;
        $newProof = 70;
        $distillate = $this->makeUnitService(['Distillate' => 'Proof'])->makeDistillate(userValue: $proof);
        $distillate->setValue($newProof);
        $expected = $newProof;
        $actual = $distillate->getProof();
        $this->assertEquals($expected, $actual);
    }
}