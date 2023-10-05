<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Length;

final class LengthTest extends TestCase
{
    public const TEST_INCH = 3600;
    public const TEST_FOOT = 300;
    public const TEST_YARD = 100;
    public const TEST_MILE = 0.056818181818181816;
    public const TEST_MILLIMETER = 91440;
    public const TEST_CENTIMETER = 9144;
    public const TEST_METER = 91.44;
    public const TEST_KILOMETER = 0.09144;

    public function testSetFootWillReturnFootWithGetValueAndDefaultPreferences(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getValue();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Length type can be set at a time.');

        new Length(inch: self::TEST_INCH, mile: self::TEST_MILE);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $length = new Length(userValue: self::TEST_KILOMETER, preferences: ['Length' => 'Kilometer']);
        $actual = $length->getValue();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $length = new Length(userValue: self::TEST_KILOMETER, preferences: ['Length' => 'Kilometer']);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Inch Conversions

    public function testSetInchWillReturnInchWithGetInch(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnFootWithGetFoot(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnYardWithGetYard(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnMileWithGetMile(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetInchWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(inch: self::TEST_INCH);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Foot Conversions

    public function testSetFootWillReturnInchWithGetInch(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnFootWithGetFoot(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnYardWithGetYard(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnMileWithGetMile(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetFootWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(foot: self::TEST_FOOT);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Yard Conversions

    public function testSetYardWillReturnInchWithGetInch(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnFootWithGetFoot(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnYardWithGetYard(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnMileWithGetMile(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYardWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(yard: self::TEST_YARD);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Mile Conversions

    public function testSetMileWillReturnInchWithGetInch(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnFootWithGetFoot(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnYardWithGetYard(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnMileWithGetMile(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMileWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(mile: self::TEST_MILE);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Millimeter Conversions

    public function testSetMillimeterWillReturnInchWithGetInch(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnFootWithGetFoot(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnYardWithGetYard(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnMileWithGetMile(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillimeterWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(millimeter: self::TEST_MILLIMETER);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Centimeter Conversions

    public function testSetCentimeterWillReturnInchWithGetInch(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnFootWithGetFoot(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnYardWithGetYard(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnMileWithGetMile(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetCentimeterWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(centimeter: self::TEST_CENTIMETER);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Meter Conversions

    public function testSetMeterWillReturnInchWithGetInch(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnFootWithGetFoot(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnYardWithGetYard(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnMileWithGetMile(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMeterWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(meter: self::TEST_METER);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }

    // Kilometer Conversions

    public function testSetKilometerWillReturnInchWithGetInch(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getInch();
        $expected = self::TEST_INCH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnFootWithGetFoot(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getFoot();
        $expected = self::TEST_FOOT;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnYardWithGetYard(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getYard();
        $expected = self::TEST_YARD;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnMileWithGetMile(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getMile();
        $expected = self::TEST_MILE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnMillimeterWithGetMillimeter(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getMillimeter();
        $expected = self::TEST_MILLIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnCentimeterWithGetCentimeter(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getCentimeter();
        $expected = self::TEST_CENTIMETER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnMeterWithGetMeter(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getMeter();
        $expected = self::TEST_METER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilometerWillReturnKilometerWithGetKilometer(): void
    {
        $length = new Length(kilometer: self::TEST_KILOMETER);
        $actual = $length->getKilometer();
        $expected = self::TEST_KILOMETER;

        $this->assertEquals($expected, $actual);
    }
}