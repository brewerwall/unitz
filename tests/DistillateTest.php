<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Distillate;

final class DistillateTest extends TestCase
{
    public const TEST_PROOF = 80;
    public const TEST_PERCENT_ALCOHOL = 40;

    public function testSetProofWillReturnProofWithGetValueAndDefaultPreferences(): void
    {
        $distillate = new Distillate(proof: self::TEST_PROOF);
        $actual = $distillate->getValue();
        $expected = self::TEST_PROOF;

        $this->assertEquals($expected, $actual);
    }

    public function testSetProofWillReturnProofWithGetProof(): void
    {
        $distillate = new Distillate(proof: self::TEST_PROOF);
        $actual = $distillate->getProof();
        $expected = self::TEST_PROOF;

        $this->assertEquals($expected, $actual);
    }

    public function testSetProofWillReturnPercentAlcoholWithGetPercentAlcohol(): void
    {
        $distillate = new Distillate(proof: self::TEST_PROOF);
        $actual = $distillate->getPercentAlcohol();
        $expected = self::TEST_PERCENT_ALCOHOL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetProofWillThrowInvalidArgumentExceptionWithOutOfRangeProof(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Proof cannot be greater than 200');

        new Distillate(proof: 201);
    }

    public function testSetPercentAlcoholWillReturnProofWithGetValueAndDefaultPreferences(): void
    {
        $distillate = new Distillate(percentAlcohol: self::TEST_PERCENT_ALCOHOL);
        $actual = $distillate->getValue();
        $expected = self::TEST_PROOF;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPercentAlcoholWillReturnProofWithGetProof(): void
    {
        $distillate = new Distillate(percentAlcohol: self::TEST_PERCENT_ALCOHOL);
        $actual = $distillate->getProof();
        $expected = self::TEST_PROOF;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPercentAlcoholWillReturnPercentAlcoholWithGetPercentAlcohol(): void
    {
        $distillate = new Distillate(percentAlcohol: self::TEST_PERCENT_ALCOHOL);
        $actual = $distillate->getPercentAlcohol();
        $expected = self::TEST_PERCENT_ALCOHOL;

        $this->assertEquals($expected, $actual);
    }

    public function testSetUserValueWillReturnProofWithGetValueAndDefaultPreferences(): void
    {
        $distillate = new Distillate(userValue: self::TEST_PROOF);
        $actual = $distillate->getValue();
        $expected = self::TEST_PROOF;

        $this->assertEquals($expected, $actual);
    }

    public function testSetPercentAlcoholWillThrowInvalidArgumentExceptionWithOutOfRangeProof(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Percent alcohol cannot be greater than 100');

        new Distillate(percentAlcohol: 101);
    }
}