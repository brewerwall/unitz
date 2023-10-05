<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Color;

final class ColorTest extends TestCase
{
    public const TEST_SRM = 12.152961955125761;
    public const TEST_EBC = 23.94133505159775;
    public const TEST_LOVIBOND = 9.532675295382962;

    public function testSetSrmWillReturnSrmWithGetValueAndDefaultPreferences(): void
    {
        $color = new Color(srm: self::TEST_SRM);
        $actual = $color->getValue();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSrmWillReturnSrmWithGetSrm(): void
    {
        $color = new Color(srm: self::TEST_SRM);
        $actual = $color->getSrm();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSrmWillReturnEbcWithGetEbc(): void
    {
        $color = new Color(srm: self::TEST_SRM);
        $actual = $color->getEbc();
        $expected = self::TEST_EBC;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSrmWillReturnLovibondWithGetLovibond(): void
    {
        $color = new Color(srm: self::TEST_SRM);
        $actual = $color->getLovibond();
        $expected = self::TEST_LOVIBOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetEbcWillReturnSrmWithGetValueAndDefaultPreferences(): void
    {
        $color = new Color(ebc: self::TEST_EBC);
        $actual = $color->getValue();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetEbcWillReturnSrmWithGetSrm(): void
    {
        $color = new Color(ebc: self::TEST_EBC);
        $actual = $color->getSrm();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetEbcWillReturnEbcWithGetEbc(): void
    {
        $color = new Color(ebc: self::TEST_EBC);
        $actual = $color->getEbc();
        $expected = self::TEST_EBC;

        $this->assertEquals($expected, $actual);
    }

    public function testSetEbcWillReturnLovibondWithGetLovibond(): void
    {
        $color = new Color(ebc: self::TEST_EBC);
        $actual = $color->getLovibond();
        $expected = self::TEST_LOVIBOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetLovibondWillReturnSrmWithGetValueAndDefaultPreferences(): void
    {
        $color = new Color(lovibond: self::TEST_LOVIBOND);
        $actual = $color->getValue();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Color type can be set at a time.');

        new Color(srm: self::TEST_SRM, ebc: self::TEST_EBC);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $color = new Color(userValue: self::TEST_SRM, preferences: ['Color' => 'Srm']);
        $actual = $color->getValue();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $color = new Color(userValue: self::TEST_SRM, preferences: ['Color' => 'Srm']);
        $actual = $color->getSrm();
        $expected = self::TEST_SRM;

        $this->assertEquals($expected, $actual);
    }
}