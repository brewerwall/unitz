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

    public function testDiluteDownToDesiredProofThrowsRuntimeExceptionWithReverseDistillateValues(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Current distillate cannot be less than desired distillate.');

        $distillateVolume = new Volume(liter: 2);
        $current = new Distillate(percentAlcohol: 35);
        $desired = new Distillate(percentAlcohol: 40);

        Spirit::diluteDownToDesiredProof($current, $desired, $distillateVolume);
    }
}