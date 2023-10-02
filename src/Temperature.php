<?php

namespace Unitz;

use InvalidArgumentException;

class Temperature extends AbstractUnitz
{
    private float $fahrenheit;
    private float $celsius;

    public function __construct(
        ?float $fahrenheit = null,
        ?float $celsius = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$fahrenheit, $celsius, $userValue])) {
            throw new InvalidArgumentException('Only one Temperature type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($fahrenheit)) {
            $this->setFahrenheit($fahrenheit);
        }

        if (is_numeric($celsius)) {
            $this->setCelsius($celsius);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    /**
     * @param float $fahrenheit
     * @return $this
     */
    public function setFahrenheit(float $fahrenheit): self
    {
        $this->fahrenheit = $fahrenheit;
        $this->celsius = self::convertFahrenheitToCelsius($fahrenheit);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getFahrenheit(?int $round = null): float
    {
        return $round ? round($this->fahrenheit, $round) : $this->fahrenheit;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getCelsius(?int $round = 2): float
    {
        return $round ? round($this->celsius, $round) : $this->celsius;
    }

    /**
     * @param float $celsius
     * @return $this
     */
    public function setCelsius(float $celsius): self
    {
        $this->fahrenheit = self::convertCelsiusToFahrenheit($celsius);
        $this->celsius = $celsius;

        return $this;
    }

    /**
     * @param float $fahrenheit
     * @return float
     */
    public static function convertFahrenheitToCelsius(float $fahrenheit): float
    {
        return ($fahrenheit - 32) * 5 / 9;
    }

    /**
     * @param float $celsius
     * @return float
     */
    public static function convertCelsiusToFahrenheit(float $celsius): float
    {
        return ($celsius * 9 / 5) + 32;
    }
}