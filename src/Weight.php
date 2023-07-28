<?php

namespace Unitz;

class Weight extends AbstractUnit
{
    private float $ounce;
    private float $pound;
    private float $gram;
    private float $kilogram;

    public function __construct(
        ?float $ounce = null,
        ?float $pound = null,
        ?float $gram = null,
        ?float $kilogram = null,
        array $preferences = []
    ) {
        if (!$this->hasOnlyOneValue([$ounce, $pound, $gram, $kilogram])) {
            throw new \InvalidArgumentException('Only one Weight type can be set at a time.');
        }

        parent::__construct($preferences);

        if ($ounce) {
            $this->setOunce($ounce);
        }

        if ($pound) {
            $this->setPound($pound);
        }

        if ($gram) {
            $this->setGram($gram);
        }

        if ($kilogram) {
            $this->setKilogram($kilogram);
        }
    }

    /**
     * @param float $ounce
     * @return $this
     */
    public function setOunce(float $ounce): self
    {
        $this->ounce = $ounce;
        $this->pound = self::convertOunceToPound($ounce);
        $this->kilogram = self::convertPoundToKilogram($this->pound);
        $this->gram = self::convertKilogramToGram($this->kilogram);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getOunce(?int $round = null): float
    {
        return $round ? round($this->ounce, $round) : $this->ounce;
    }

    /**
     * @param float $pound
     * @return $this
     */
    public function setPound(float $pound): self
    {
        $this->ounce = self::convertPoundToOunce($pound);
        $this->pound = $pound;
        $this->kilogram = self::convertPoundToKilogram($this->pound);
        $this->gram = self::convertKilogramToGram($this->kilogram);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getPound(?int $round = null): float
    {
        return $round ? round($this->pound, $round) : $this->pound;
    }

    /**
     * @param float $gram
     * @return $this
     */
    public function setGram(float $gram): self
    {
        $this->gram = $gram;
        $this->kilogram = self::convertGramToKilogram($gram);
        $this->pound = self::convertKilogramToPound($this->kilogram);
        $this->ounce = self::convertPoundToOunce($this->pound);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getGram(?int $round = null): float
    {
        return $round ? round($this->gram, $round) : $this->gram;
    }

    /**
     * @param float $kilogram
     * @return $this
     */
    public function setKilogram(float $kilogram): self
    {
        $this->gram = self::convertKilogramToGram($kilogram);
        $this->kilogram = $kilogram;
        $this->pound = self::convertKilogramToPound($this->kilogram);
        $this->ounce = self::convertPoundToOunce($this->pound);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilogram(?int $round = null): float
    {
        return $round ? round($this->kilogram, $round) : $this->kilogram;
    }

    /**
     * @param float $pound
     * @return float
     */
    public static function convertPoundToOunce(float $pound): float
    {
        return $pound * 16;
    }

    /**
     * @param float $ounce
     * @return float
     */
    public static function convertOunceToPound(float $ounce): float
    {
        return $ounce / 16;
    }

    /**
     * @param float $pound
     * @return float
     */
    public static function convertPoundToKilogram(float $pound): float
    {
        return $pound * 0.45359237;
    }

    /**
     * @param float $kilogram
     * @return float
     */
    public static function convertKilogramToPound(float $kilogram): float
    {
        return $kilogram / 0.45359237;
    }

    /**
     * @param float $kilogram
     * @return float
     */
    public static function convertKilogramToGram(float $kilogram): float
    {
        return $kilogram * 1000;
    }

    /**
     * @param float $gram
     * @return float
     */
    public static function convertGramToKilogram(float $gram): float
    {
        return $gram / 1000;
    }
}