<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Weight;

final class WeightTest extends TestCase
{
    public const TEST_OUNCE = 1161.6;
    public const TEST_POUND = 72.6;
    public const TEST_GRAM = 32930.806062;
    public const TEST_KILOGRAM = 32.930806062;

    public function testSetPoundWillReturnPoundWithGetValueAndDefaultPreferences(): void
    {
        $weight = new Weight(pound: self::TEST_POUND);
        $actual = $weight->getValue();
        $expected = self::TEST_POUND;

        $this->assertEquals($expected, $actual);
    }

    // Pound Conversions

    public function testSetPoundWillReturnPoundWithGetPound(): void
    {
        $weight = new Weight(pound: self::TEST_POUND);
        $actual = $weight->getPound();
        $expected = self::TEST_POUND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPoundWillReturnOunceWithGetOunce(): void
    {
        $weight = new Weight(pound: self::TEST_POUND);
        $actual = $weight->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPoundWillReturnGramWithGetGram(): void
    {
        $weight = new Weight(pound: self::TEST_POUND);
        $actual = $weight->getGram();
        $expected = self::TEST_GRAM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPoundWillReturnKilogramWithGetKilogram(): void
    {
        $weight = new Weight(pound: self::TEST_POUND);
        $actual = $weight->getKilogram();
        $expected = self::TEST_KILOGRAM;

        $this->assertEquals($expected, $actual);
    }

    // Ounce Conversions

    public function testSetOunceWillReturnPoundWithGetPound(): void
    {
        $weight = new Weight(ounce: self::TEST_OUNCE);
        $actual = $weight->getPound();
        $expected = self::TEST_POUND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnOunceWithGetOunce(): void
    {
        $weight = new Weight(ounce: self::TEST_OUNCE);
        $actual = $weight->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnGramWithGetGram(): void
    {
        $weight = new Weight(ounce: self::TEST_OUNCE);
        $actual = $weight->getGram();
        $expected = self::TEST_GRAM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetOunceWillReturnKilogramWithGetKilogram(): void
    {
        $weight = new Weight(ounce: self::TEST_OUNCE);
        $actual = $weight->getKilogram();
        $expected = self::TEST_KILOGRAM;

        $this->assertEquals($expected, $actual);
    }

    // Gram Conversions

    public function testSetGramWillReturnPoundWithGetPound(): void
    {
        $weight = new Weight(gram: self::TEST_GRAM);
        $actual = $weight->getPound();
        $expected = self::TEST_POUND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGramWillReturnOunceWithGetOunce(): void
    {
        $weight = new Weight(gram: self::TEST_GRAM);
        $actual = $weight->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGramWillReturnGramWithGetGram(): void
    {
        $weight = new Weight(gram: self::TEST_GRAM);
        $actual = $weight->getGram();
        $expected = self::TEST_GRAM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetGramWillReturnKilogramWithGetKilogram(): void
    {
        $weight = new Weight(gram: self::TEST_GRAM);
        $actual = $weight->getKilogram();
        $expected = self::TEST_KILOGRAM;

        $this->assertEquals($expected, $actual);
    }

    // Kilogram Conversions

    public function testSetKilogramWillReturnPoundWithGetPound(): void
    {
        $weight = new Weight(kilogram: self::TEST_KILOGRAM);
        $actual = $weight->getPound();
        $expected = self::TEST_POUND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilogramWillReturnOunceWithGetOunce(): void
    {
        $weight = new Weight(kilogram: self::TEST_KILOGRAM);
        $actual = $weight->getOunce();
        $expected = self::TEST_OUNCE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilogramWillReturnGramWithGetGram(): void
    {
        $weight = new Weight(kilogram: self::TEST_KILOGRAM);
        $actual = $weight->getGram();
        $expected = self::TEST_GRAM;

        $this->assertEquals($expected, $actual);
    }

    public function testSetKilogramWillReturnKilogramWithGetKilogram(): void
    {
        $weight = new Weight(kilogram: self::TEST_KILOGRAM);
        $actual = $weight->getKilogram();
        $expected = self::TEST_KILOGRAM;

        $this->assertEquals($expected, $actual);
    }
}