<?php

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Volume;

final class VolumeTest extends TestCase
{
    public const TEST_OUNCE = 4700.096;
    public const TEST_GALLON = 36.7195;
    public const TEST_BARREL = 1.1844999999999999;
    public const TEST_MILLILITER = 138998.42800258799;
    public const TEST_LITER = 138.99842800258799;
    public const TEST_HECTOLITER = 1.38998428002588;

    public function testSetGallonWillReturnGallonWithGetValueAndDefaultPreferences(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getValue();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    // Gallon Conversions

    public function testSetGallonWillReturnGallonWithGetGallon(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getGallon();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGallonWillReturnOunceWithGetOunce(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGallonWillReturnBarrelWithGetBarrel(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getBarrel();
        $expected = self::TEST_BARREL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGallonWillReturnMilliliterWithGetMilliliter(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getMilliliter();
        $expected = self::TEST_MILLILITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGallonWillReturnLiterWithGetLiter(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getLiter();
        $expected = self::TEST_LITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGallonWillReturnHectoliterWithGetHectoliter(): void
    {
        $volume = new Volume(gallon: self::TEST_GALLON);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    // Ounce Conversions

    public function testSetOunceWillReturnGallonWithGetGallon(): void
    {
        $volume = new Volume(ounce: self::TEST_OUNCE);
        $actual = $volume->getGallon();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnOunceWithGetOunce(): void
    {
        $volume = new Volume(ounce: self::TEST_OUNCE);
        $actual = $volume->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnBarrelWithGetBarrel(): void
    {
        $volume = new Volume(ounce: self::TEST_OUNCE);
        $actual = $volume->getBarrel();
        $expected = self::TEST_BARREL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnMilliliterWithGetMilliliter(): void
    {
        $volume = new Volume(ounce: self::TEST_OUNCE);
        $actual = $volume->getMilliliter();
        $expected = self::TEST_MILLILITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnLiterWithGetLiter(): void
    {
        $volume = new Volume(ounce: self::TEST_OUNCE);
        $actual = $volume->getLiter();
        $expected = self::TEST_LITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnHectoliterWithGetHectoliter(): void
    {
        $volume = new Volume(ounce: self::TEST_OUNCE);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    // Barrel Conversions

    public function testSetBarrelWillReturnGallonWithGetGallon(): void
    {
        $volume = new Volume(barrel: self::TEST_BARREL);
        $actual = $volume->getGallon();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarrelWillReturnOunceWithGetOunce(): void
    {
        $volume = new Volume(barrel: self::TEST_BARREL);
        $actual = $volume->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarrelWillReturnBarrelWithGetBarrel(): void
    {
        $volume = new Volume(barrel: self::TEST_BARREL);
        $actual = $volume->getBarrel();
        $expected = self::TEST_BARREL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarrelWillReturnMilliliterWithGetMilliliter(): void
    {
        $volume = new Volume(barrel: self::TEST_BARREL);
        $actual = $volume->getMilliliter();
        $expected = self::TEST_MILLILITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarrelWillReturnLiterWithGetLiter(): void
    {
        $volume = new Volume(barrel: self::TEST_BARREL);
        $actual = $volume->getLiter();
        $expected = self::TEST_LITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetBarrelWillReturnHectoliterWithGetHectoliter(): void
    {
        $volume = new Volume(barrel: self::TEST_BARREL);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    // Milliliter Conversions

    public function testSetMilliliterWillReturnGallonWithGetGallon(): void
    {
        $volume = new Volume(milliliter: self::TEST_MILLILITER);
        $actual = $volume->getGallon();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMilliliterWillReturnOunceWithGetOunce(): void
    {
        $volume = new Volume(milliliter: self::TEST_MILLILITER);
        $actual = $volume->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMilliliterWillReturnBarrelWithGetBarrel(): void
    {
        $volume = new Volume(milliliter: self::TEST_MILLILITER);
        $actual = $volume->getBarrel();
        $expected = self::TEST_BARREL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMilliliterWillReturnMilliliterWithGetMilliliter(): void
    {
        $volume = new Volume(milliliter: self::TEST_MILLILITER);
        $actual = $volume->getMilliliter();
        $expected = self::TEST_MILLILITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMilliliterWillReturnLiterWithGetLiter(): void
    {
        $volume = new Volume(milliliter: self::TEST_MILLILITER);
        $actual = $volume->getLiter();
        $expected = self::TEST_LITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMilliliterWillReturnHectoliterWithGetHectoliter(): void
    {
        $volume = new Volume(milliliter: self::TEST_MILLILITER);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    // Liter Conversions

    public function testSetLiterWillReturnGallonWithGetGallon(): void
    {
        $volume = new Volume(liter: self::TEST_LITER);
        $actual = $volume->getGallon();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    public function testSetLiterWillReturnOunceWithGetOunce(): void
    {
        $volume = new Volume(liter: self::TEST_LITER);
        $actual = $volume->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetLiterWillReturnBarrelWithGetBarrel(): void
    {
        $volume = new Volume(liter: self::TEST_LITER);
        $actual = $volume->getBarrel();
        $expected = self::TEST_BARREL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetLiterWillReturnMilliliterWithGetMilliliter(): void
    {
        $volume = new Volume(liter: self::TEST_LITER);
        $actual = $volume->getMilliliter();
        $expected = self::TEST_MILLILITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetLiterWillReturnLiterWithGetLiter(): void
    {
        $volume = new Volume(liter: self::TEST_LITER);
        $actual = $volume->getLiter();
        $expected = self::TEST_LITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetLiterWillReturnHectoliterWithGetHectoliter(): void
    {
        $volume = new Volume(liter: self::TEST_LITER);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    // Hectoliter Conversions

    public function testSetHectoliterWillReturnGallonWithGetGallon(): void
    {
        $volume = new Volume(hectoliter: self::TEST_HECTOLITER);
        $actual = $volume->getGallon();
        $expected = self::TEST_GALLON;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHectoliterWillReturnOunceWithGetOunce(): void
    {
        $volume = new Volume(hectoliter: self::TEST_HECTOLITER);
        $actual = $volume->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHectoliterWillReturnBarrelWithGetBarrel(): void
    {
        $volume = new Volume(hectoliter: self::TEST_HECTOLITER);
        $actual = $volume->getBarrel();
        $expected = self::TEST_BARREL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHectoliterWillReturnMilliliterWithGetMilliliter(): void
    {
        $volume = new Volume(hectoliter: self::TEST_HECTOLITER);
        $actual = $volume->getMilliliter();
        $expected = self::TEST_MILLILITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHectoliterWillReturnLiterWithGetLiter(): void
    {
        $volume = new Volume(hectoliter: self::TEST_HECTOLITER);
        $actual = $volume->getLiter();
        $expected = self::TEST_LITER;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHectoliterWillReturnHectoliterWithGetHectoliter(): void
    {
        $volume = new Volume(hectoliter: self::TEST_HECTOLITER);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Volume type can be set at a time.');

        new Volume(gallon: self::TEST_GALLON, liter: self::TEST_LITER);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $volume = new Volume(userValue: self::TEST_HECTOLITER, preferences: ['Volume' => 'Hectoliter']);
        $actual = $volume->getValue();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $volume = new Volume(userValue: self::TEST_HECTOLITER, preferences: ['Volume' => 'Hectoliter']);
        $actual = $volume->getHectoliter();
        $expected = self::TEST_HECTOLITER;

        $this->assertEquals($expected, $actual);
    }
}