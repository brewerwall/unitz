<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Pressure;

final class PressureTest extends TestCase
{
    public const TEST_BAR = 1.0514504852523279;
    public const TEST_PSI = 15.249999999999998;

    public function testSetPsiWillReturnPsiWithGetValueAndDefaultPreferences(): void
    {
        $pressure = new Pressure(psi: self::TEST_PSI);
        $actual = $pressure->getValue();
        $expected = self::TEST_PSI;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPsiWillReturnPsiWithGetPsi(): void
    {
        $pressure = new Pressure(psi: self::TEST_PSI);
        $actual = $pressure->getPsi();
        $expected = self::TEST_PSI;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPsiWillReturnBarWithGetBar(): void
    {
        $pressure = new Pressure(psi: self::TEST_PSI);
        $actual = $pressure->getBar();
        $expected = self::TEST_BAR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarWillReturnPsiWithGetValueAndDefaultPreferences(): void
    {
        $pressure = new Pressure(bar: self::TEST_BAR);
        $actual = $pressure->getValue();
        $expected = self::TEST_PSI;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarWillReturnPsiWithGetPsi(): void
    {
        $pressure = new Pressure(bar: self::TEST_BAR);
        $actual = $pressure->getPsi();
        $expected = self::TEST_PSI;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarWillReturnBarWithGetBar(): void
    {
        $pressure = new Pressure(bar: self::TEST_BAR);
        $actual = $pressure->getBar();
        $expected = self::TEST_BAR;

        $this->assertEquals($expected, $actual);
    }
}