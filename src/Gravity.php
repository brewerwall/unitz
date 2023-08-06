<?php

namespace Unitz;

use InvalidArgumentException;

class Gravity extends AbstractUnitz
{
    private float $plato;

    private float $specificGravity;

    private float $brix;

    public function __construct(
        float $plato = null,
        float $specificGravity = null,
        float $brix = null,
        array $preferences = []
    ) {
        if (!$this->hasOnlyOneValue([$plato, $specificGravity, $brix])) {
            throw new InvalidArgumentException('Only one Gravity type can be set at a time.');
        }

        parent::__construct($preferences);

        if ($plato) {
            $this->setPlato($plato);
        }

        if ($specificGravity) {
            $this->setSpecificGravity($specificGravity);
        }

        if ($brix) {
            $this->setBrix($brix);
        }
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getPlato(?int $round = null): float
    {
        return $round ? round($this->plato, $round) : $this->plato;
    }

    /**
     * @param float $plato
     * @return $this
     */
    public function setPlato(float $plato): self
    {
        $this->plato = $plato;
        $this->specificGravity = self::convertPlatoToSpecificGravity($plato);
        $this->brix = self::convertPlatoToBrix($plato);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getSpecificGravity(?int $round = null): float
    {
        return $round ? round($this->specificGravity, $round) : $this->specificGravity;
    }

    /**
     * @param float $specificGravity
     * @return $this
     */
    public function setSpecificGravity(float $specificGravity): self
    {
        $this->plato = self::convertSpecificGravityToPlato($specificGravity);
        $this->specificGravity = $specificGravity;
        $this->brix = self::convertSpecificGravityToBrix($specificGravity);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getBrix(?int $round = null): float
    {
        return $round ? round($this->brix, $round) : $this->brix;
    }

    /**
     * @param float $brix
     * @return $this
     */
    public function setBrix(float $brix): self
    {
        $this->plato = self::convertBrixToPlato($brix);
        $this->specificGravity = self::convertBrixToSpecificGravity($brix);
        $this->brix = $brix;

        return $this;
    }

    /**
     * @param float $plato
     * @return float
     */
    public static function convertPlatoToSpecificGravity(float $plato): float
    {
        return 259 / (259 - $plato);
    }

    /**
     * @param float $plato
     * @return float
     */
    public static function convertPlatoToBrix(float $plato): float
    {
        $specificGravity = self::convertPlatoToSpecificGravity($plato);

        return self::convertSpecificGravityToBrix($specificGravity);
    }

    /**
     * @param float $specificGravity
     * @return float
     */
    public static function convertSpecificGravityToPlato(float $specificGravity): float
    {
        return 259 - (259 / $specificGravity);
    }

    /**
     * Source:
     * https://homebrewacademy.com/specific-gravity-to-brix/
     *
     * @param float $specificGravity
     * @return float
     */
    public static function convertSpecificGravityToBrix(float $specificGravity): float
    {
        return (((182.4601 * $specificGravity - 775.6821) * $specificGravity + 1262.7794) * $specificGravity - 669.5622);
    }

    public static function convertBrixToPlato(float $brix): float
    {
        $specificGravity = self::convertBrixToSpecificGravity($brix);

        return self::convertSpecificGravityToPlato($specificGravity);
    }

    /**
     * Source:
     * https://homebrewacademy.com/specific-gravity-to-brix/
     *
     * @param float $brix
     * @return float
     */
    public static function convertBrixToSpecificGravity(float $brix): float
    {
        return ($brix / (258.6 - (($brix / 258.2) * 227.1))) + 1;
    }

}