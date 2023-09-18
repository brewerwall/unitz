<?php

namespace Tests\Calculate;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Calculate\Spirit;
use Unitz\Distillate;
use Unitz\Volume;

class SpiritTest extends TestCase
{
    public function testDiluteDownToDesiredProofCalculatesCorrectly(): void
    {
        $distillateVolume = new Volume(liter: 2);
        $current = new Distillate(percentAlcohol: 75);
        $desired = new Distillate(percentAlcohol: 40);
        $expected = new Volume(liter: 1.75);

        $actual = Spirit::diluteDownToDesiredProof($current, $desired, $distillateVolume);
        $this->assertEquals($expected, $actual);
    }

    public function testDiluteDownToDesiredProofThrowsInvalidArgumentExceptionWithReverseDistillateValues(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Current distillate cannot be less than desired distillate.');

        $distillateVolume = new Volume(liter: 2);
        $current = new Distillate(percentAlcohol: 35);
        $desired = new Distillate(percentAlcohol: 40);

        Spirit::diluteDownToDesiredProof($current, $desired, $distillateVolume);
    }

    public function testDistilledAlcoholVolumeCalculatesCorrectly(): void
    {
        $volume = new Volume(liter: 20);
        $wash = new Distillate(percentAlcohol: 9);
        $stillEfficiencyPercent = 92;
        $expected = new Volume(liter: 1.858695652173913);

        $actual = Spirit::distilledAlcoholVolume($volume, $wash, $stillEfficiencyPercent);
        $this->assertEquals($expected, $actual);
    }

    public function testDistilledAlcoholVolumeThrowsInvalidArgumentExceptionWithZeroStillEfficiency(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Still Efficiency cannot be zero.');

        $volume = new Volume(liter: 20);
        $wash = new Distillate(percentAlcohol: 9);
        $stillEfficiencyPercent = 0;

        Spirit::distilledAlcoholVolume($volume, $wash, $stillEfficiencyPercent);
    }

    public function testDistilledRemainingWaterVolumeCalculatesCorrectly(): void
    {
        $volume = new Volume(liter: 20);
        $wash = new Distillate(percentAlcohol: 9);
        $stillEfficiencyPercent = 92;
        $expected = new Volume(liter: 18.141304347826086);

        $actual = Spirit::distilledRemainingWaterVolume($volume, $wash, $stillEfficiencyPercent);
        $this->assertEquals($expected, $actual);
    }

    public function testDistilledRemainingWaterVolumeThrowsInvalidArgumentExceptionWithZeroStillEfficiency(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Still Efficiency cannot be zero.');

        $volume = new Volume(liter: 20);
        $wash = new Distillate(percentAlcohol: 9);
        $stillEfficiencyPercent = 0;

        Spirit::distilledRemainingWaterVolume($volume, $wash, $stillEfficiencyPercent);
    }
}