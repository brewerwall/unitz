<?php

namespace Unitz;

class Gravity extends AbstractUnit
{
    private ?float $plato = null;

    private ?float $specificGravity = null;

    private ?float $brix = null;

    public function __construct(
        float $plato = null,
        float $specificGravity = null,
        float $brix = null,
        array $preferences = []
    ) {
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
     * @param int $round
     * @return float
     */
    public function getPlato(int $round = 2): float
    {
        return round($this->plato, $round);
    }

    /**
     * @param float $plato
     * @return $this
     */
    public function setPlato(float $plato): self
    {
        $this->plato = $plato;
        $this->specificGravity = $this->convertPlatoToSpecificGravity($plato);
        $this->brix = $this->convertPlatoToBrix($plato);

        return $this;
    }

    /**
     * @param int $round
     * @return float
     */
    public function getSpecificGravity(int $round = 3): float
    {
        return round($this->specificGravity, $round);
    }

    /**
     * @param float $specificGravity
     * @return $this
     */
    public function setSpecificGravity(float $specificGravity): self
    {
        $this->plato = $this->convertSpecificGravityToPlato($specificGravity);
        $this->specificGravity = $specificGravity;
        $this->brix = $this->convertSpecificGravityToBrix($specificGravity);

        return $this;
    }

    /**
     * @param int $round
     * @return float
     */
    public function getBrix(int $round = 2): float
    {
        return round($this->brix, $round);
    }

    /**
     * @param float $brix
     * @return $this
     */
    public function setBrix(float $brix): self
    {
        $this->plato = $this->convertBrixToPlato($brix);
        $this->specificGravity = $this->convertBrixToSpecificGravity($brix);
        $this->brix = $brix;

        return $this;
    }

    private function convertPlatoToSpecificGravity(float $plato): float
    {
        return 259 / (259 - $plato);
    }

    private function convertPlatoToBrix(float $plato): float
    {
        $specificGravity = $this->convertPlatoToSpecificGravity($plato);

        return $this->convertSpecificGravityToBrix($specificGravity);
    }

    private function convertSpecificGravityToPlato(float $specificGravity): float
    {
        return 259 - (259 / $specificGravity);
    }

    private function convertSpecificGravityToBrix(float $specificGravity): float
    {
        return ($specificGravity - 1) / 0.004;
    }

    private function convertBrixToPlato(float $brix): float
    {
        $specificGravity = $this->convertBrixToSpecificGravity($brix);

        return $this->convertSpecificGravityToPlato($specificGravity);
    }

    private function convertBrixToSpecificGravity(float $brix): float
    {
        return ($brix * 0.004) + 1;
    }
}