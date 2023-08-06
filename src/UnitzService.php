<?php

namespace Unitz;

final class UnitzService extends BaseUnitz
{
    /**
     * @param float|null $srm
     * @param float|null $ebc
     * @param float|null $lovibond
     * @return \Unitz\Color
     */
    public function makeColor(?float $srm = null, ?float $ebc = null, ?float $lovibond = null): Color
    {
        return new Color($srm, $ebc, $lovibond, $this->getPreferences());
    }

    /**
     * @param float|null $plato
     * @param float|null $specificGravity
     * @param float|null $brix
     * @return \Unitz\Gravity
     */
    public function makeGravity(?float $plato = null, ?float $specificGravity = null, ?float $brix = null): Gravity
    {
        return new Gravity($plato, $specificGravity, $brix, $this->getPreferences());
    }

    /**
     * @param float|null $bar
     * @param float|null $psi
     * @return \Unitz\Pressure
     */
    public function makePressure(?float $bar = null, ?float $psi = null): Pressure
    {
        return new Pressure($bar, $psi, $this->getPreferences());
    }

    /**
     * @param float|null $fahrenheit
     * * @param float|null $celsius
     * @return \Unitz\Temperature
     */
    public function makeTemperature(?float $fahrenheit = null, ?float $celsius = null): Temperature
    {
        return new Temperature($fahrenheit, $celsius, $this->getPreferences());
    }

    /**
     * @param float|null $ounce
     * @param float|null $gallon
     * @param float|null $barrel
     * @param float|null $milliliter
     * @param float|null $liter
     * @param float|null $hectoliter
     * @return \Unitz\Volume
     */
    public function makeVolume(
        float $ounce = null,
        float $gallon = null,
        float $barrel = null,
        float $milliliter = null,
        float $liter = null,
        float $hectoliter = null
    ): Volume {
        return new Volume($ounce, $gallon, $barrel, $milliliter, $liter, $hectoliter, $this->getPreferences());
    }

    /**
     * @param float|null $ounce
     * @param float|null $pound
     * @param float|null $gram
     * @param float|null $kilogram
     * @return \Unitz\Weight
     */
    public function makeWeight(
        ?float $ounce = null,
        ?float $pound = null,
        ?float $gram = null,
        ?float $kilogram = null,
    ): Weight {
        return new Weight($ounce, $pound, $gram, $kilogram, $this->getPreferences());
    }
}