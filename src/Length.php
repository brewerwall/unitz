<?php

namespace Unitz;

use InvalidArgumentException;

class Length extends AbstractUnitz
{
    private float $inch;
    private float $foot;
    private float $yard;
    private float $mile;
    private float $millimeter;
    private float $centimeter;
    private float $meter;
    private float $kilometer;

    public function __construct(
        ?float $inch = null,
        ?float $foot = null,
        ?float $yard = null,
        ?float $mile = null,
        ?float $millimeter = null,
        ?float $centimeter = null,
        ?float $meter = null,
        ?float $kilometer = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue(
            [$inch, $foot, $yard, $mile, $millimeter, $centimeter, $meter, $kilometer, $userValue]
        )) {
            throw new InvalidArgumentException('Only one Length type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($inch)) {
            $this->setInch($inch);
        }

        if (is_numeric($foot)) {
            $this->setFoot($foot);
        }

        if (is_numeric($yard)) {
            $this->setYard($yard);
        }

        if (is_numeric($mile)) {
            $this->setMile($mile);
        }

        if (is_numeric($millimeter)) {
            $this->setMillimeter($millimeter);
        }

        if (is_numeric($centimeter)) {
            $this->setCentimeter($centimeter);
        }

        if (is_numeric($meter)) {
            $this->setMeter($meter);
        }

        if (is_numeric($kilometer)) {
            $this->setKilometer($kilometer);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    /**
     * @param float $inch
     * @return $this
     */
    public function setInch(float $inch): self
    {
        $this->inch = $inch;
        $this->foot = self::convertInchToFoot($inch);
        $this->yard = self::convertFootToYard($this->foot);
        $this->mile = self::convertYardToMile($this->yard);
        $this->millimeter = self::convertInchToMillimeter($inch);
        $this->centimeter = self::convertMillimeterToCentimeter($this->millimeter);
        $this->meter = self::convertCentimeterToMeter($this->centimeter);
        $this->kilometer = self::convertMeterToKilometer($this->meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getInch(?int $round = null): float
    {
        return $round ? round($this->inch, $round) : $this->inch;
    }

    /**
     * @param float $foot
     * @return $this
     */
    public function setFoot(float $foot): self
    {
        $this->foot = $foot;
        $this->inch = self::convertFootToInch($foot);
        $this->yard = self::convertFootToYard($foot);
        $this->mile = self::convertYardToMile($this->yard);
        $this->millimeter = self::convertInchToMillimeter($this->inch);
        $this->centimeter = self::convertMillimeterToCentimeter($this->millimeter);
        $this->meter = self::convertCentimeterToMeter($this->centimeter);
        $this->kilometer = self::convertMeterToKilometer($this->meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getFoot(?int $round = null): float
    {
        return $round ? round($this->foot, $round) : $this->foot;
    }

    /**
     * @param float $yard
     * @return $this
     */
    public function setYard(float $yard): self
    {
        $this->yard = $yard;
        $this->foot = self::convertYardToFoot($yard);
        $this->inch = self::convertFootToInch($this->foot);
        $this->mile = self::convertYardToMile($yard);
        $this->millimeter = self::convertInchToMillimeter($this->inch);
        $this->centimeter = self::convertMillimeterToCentimeter($this->millimeter);
        $this->meter = self::convertCentimeterToMeter($this->centimeter);
        $this->kilometer = self::convertMeterToKilometer($this->meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getYard(?int $round = null): float
    {
        return $round ? round($this->yard, $round) : $this->yard;
    }

    /**
     * @param float $mile
     * @return $this
     */
    public function setMile(float $mile): self
    {
        $this->mile = $mile;
        $this->yard = self::convertMileToYard($mile);
        $this->foot = self::convertYardToFoot($this->yard);
        $this->inch = self::convertFootToInch($this->foot);
        $this->millimeter = self::convertInchToMillimeter($this->inch);
        $this->centimeter = self::convertMillimeterToCentimeter($this->millimeter);
        $this->meter = self::convertCentimeterToMeter($this->centimeter);
        $this->kilometer = self::convertMeterToKilometer($this->meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMile(?int $round = null): float
    {
        return $round ? round($this->mile, $round) : $this->mile;
    }

    /**
     * @param float $millimeter
     * @return $this
     */
    public function setMillimeter(float $millimeter): self
    {
        $this->millimeter = $millimeter;
        $this->inch = self::convertMillimeterToInch($millimeter);
        $this->foot = self::convertInchToFoot($this->inch);
        $this->yard = self::convertFootToYard($this->foot);
        $this->mile = self::convertYardToMile($this->yard);
        $this->centimeter = self::convertMillimeterToCentimeter($millimeter);
        $this->meter = self::convertCentimeterToMeter($this->centimeter);
        $this->kilometer = self::convertMeterToKilometer($this->meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMillimeter(?int $round = null): float
    {
        return $round ? round($this->millimeter, $round) : $this->millimeter;
    }

    /**
     * @param float $centimeter
     * @return $this
     */
    public function setCentimeter(float $centimeter): self
    {
        $this->centimeter = $centimeter;
        $this->millimeter = self::convertCentimeterToMillimeter($centimeter);
        $this->inch = self::convertMillimeterToInch($this->millimeter);
        $this->foot = self::convertInchToFoot($this->inch);
        $this->yard = self::convertFootToYard($this->foot);
        $this->mile = self::convertYardToMile($this->yard);
        $this->meter = self::convertCentimeterToMeter($centimeter);
        $this->kilometer = self::convertMeterToKilometer($this->meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getCentimeter(?int $round = null): float
    {
        return $round ? round($this->centimeter, $round) : $this->centimeter;
    }

    /**
     * @param float $meter
     * @return $this
     */
    public function setMeter(float $meter): self
    {
        $this->meter = $meter;
        $this->centimeter = self::convertMeterToCentimeter($meter);
        $this->millimeter = self::convertCentimeterToMillimeter($this->centimeter);
        $this->inch = self::convertMillimeterToInch($this->millimeter);
        $this->foot = self::convertInchToFoot($this->inch);
        $this->yard = self::convertFootToYard($this->foot);
        $this->mile = self::convertYardToMile($this->yard);
        $this->kilometer = self::convertMeterToKilometer($meter);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMeter(?int $round = null): float
    {
        return $round ? round($this->meter, $round) : $this->meter;
    }

    /**
     * @param float $kilometer
     * @return $this
     */
    public function setKilometer(float $kilometer): self
    {
        $this->kilometer = $kilometer;
        $this->meter = self::convertKilometerToMeter($kilometer);
        $this->centimeter = self::convertMeterToCentimeter($this->meter);
        $this->millimeter = self::convertCentimeterToMillimeter($this->centimeter);
        $this->inch = self::convertMillimeterToInch($this->millimeter);
        $this->foot = self::convertInchToFoot($this->inch);
        $this->yard = self::convertFootToYard($this->foot);
        $this->mile = self::convertYardToMile($this->yard);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilometer(?int $round = null): float
    {
        return $round ? round($this->kilometer, $round) : $this->kilometer;
    }

    /**
     * @param float $inch
     * @return float
     */
    public static function convertInchToFoot(float $inch): float
    {
        return $inch / 12;
    }

    /**
     * @param float $foot
     * @return float
     */
    public static function convertFootToInch(float $foot): float
    {
        return $foot * 12;
    }

    /**
     * @param float $foot
     * @return float
     */
    public static function convertFootToYard(float $foot): float
    {
        return $foot / 3;
    }

    /**
     * @param float $yard
     * @return float
     */
    public static function convertYardToFoot(float $yard): float
    {
        return $yard * 3;
    }

    /**
     * @param float $yard
     * @return float
     */
    public static function convertYardToMile(float $yard): float
    {
        return $yard / 1760;
    }

    /**
     * @param float $mile
     * @return float
     */
    public static function convertMileToYard(float $mile): float
    {
        return $mile * 1760;
    }

    /**
     * @param float $millimeter
     * @return float
     */
    public static function convertMillimeterToInch(float $millimeter): float
    {
        return $millimeter / 25.4;
    }

    /**
     * @param float $inch
     * @return float
     */
    public static function convertInchToMillimeter(float $inch): float
    {
        return $inch * 25.4;
    }

    /**
     * @param float $millimeter
     * @return float
     */
    public static function convertMillimeterToCentimeter(float $millimeter): float
    {
        return $millimeter / 10;
    }

    /**
     * @param float $centimeter
     * @return float
     */
    public static function convertCentimeterToMillimeter(float $centimeter): float
    {
        return $centimeter * 10;
    }

    /**
     * @param float $centimeter
     * @return float
     */
    public static function convertCentimeterToMeter(float $centimeter): float
    {
        return $centimeter / 100;
    }

    /**
     * @param float $meter
     * @return float
     */
    public static function convertMeterToCentimeter(float $meter): float
    {
        return $meter * 100;
    }

    /**
     * @param float $meter
     * @return float
     */
    public static function convertMeterToKilometer(float $meter): float
    {
        return $meter / 1000;
    }

    /**
     * @param float $kilometer
     * @return float
     */
    public static function convertKilometerToMeter(float $kilometer): float
    {
        return $kilometer * 1000;
    }
}