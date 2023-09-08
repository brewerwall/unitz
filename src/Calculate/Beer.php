<?php

namespace Unitz\Calculate;

use RuntimeException;
use UnexpectedValueException;
use Unitz\Color;
use Unitz\Gravity;
use Unitz\Temperature;
use Unitz\Time;
use Unitz\Volume;
use Unitz\Weight;

class Beer
{
    public const ABV_STANDARD_FORMULA = 'abv_standard';
    public const ABV_ALTERNATE_FORMULA = 'abv_alternate';
    public const CALORIE_BASE_VOLUME_IN_OUNCE = 12;
    public const DEFAULT_CALIBRATE_TEMPERATURE = 59;

    /**
     * Standard Reference Method (Srm) is the method for color assessment of wort or beer as published
     * in the recommended methods of the American Society of Brewing Chemists
     *
     * @param \Unitz\Weight $weight
     * @param \Unitz\Color $color
     * @param \Unitz\Volume $volume
     * @return \Unitz\Color
     * @throws \RuntimeException
     */
    public static function standardReferenceMethod(Weight $weight, Color $color, Volume $volume): Color
    {
        $srm = 1.4922 * (self::maltColorUnit($weight, $color, $volume) ** 0.6859);

        return new Color(srm: $srm);
    }

    /**
     * Malt Color Unit (MCU) is an equation that helps determine what color a beer would be.
     *
     * @param \Unitz\Weight $weight
     * @param \Unitz\Color $color
     * @param \Unitz\Volume $volume
     * @return float
     * @throws \RuntimeException
     */
    public static function maltColorUnit(Weight $weight, Color $color, Volume $volume): float
    {
        if ($volume->getGallon() === 0.0) {
            throw new RuntimeException('Volume cannot be zero');
        }

        return ($weight->getPound() * $color->getLovibond()) / $volume->getGallon();
    }

    /**
     * IBU
     * Based off Palmer's Calculation
     *
     * @param float $alphaAcid
     * @param \Unitz\Weight $weight
     * @param \Unitz\Time $time
     * @param \Unitz\Gravity $gravity
     * @param \Unitz\Volume $volume
     * @return float
     */
    public static function internationalBitternessUnits(
        float $alphaAcid,
        Weight $weight,
        Time $time,
        Gravity $gravity,
        Volume $volume
    ): float {
        if ($volume->getGallon() === 0.0) {
            throw new RuntimeException('Volume cannot be zero');
        }

        return self::alphaAcidUnit($alphaAcid, $weight) * self::hopUtilization(
                $time,
                $gravity
            ) * 75 / $volume->getGallon();
    }

    /**
     * AAU
     *
     * @param float $alphaAcid
     * @param \Unitz\Weight $weight
     * @return float
     */
    public static function alphaAcidUnit(float $alphaAcid, Weight $weight): float
    {
        return $alphaAcid * $weight->getOunce();
    }

    /**
     * @param \Unitz\Time $time
     * @param \Unitz\Gravity $gravity
     * @return float
     */
    public static function hopUtilization(Time $time, Gravity $gravity): float
    {
        return (1.65 * (0.000125 ** ($gravity->getSpecificGravity() - 1))) * (1 - (M_E ** (-0.04 * $time->getMinute(
                        )))) / 4.15;
    }

    /**
     * Calories per Volume.
     *
     * @param \Unitz\Gravity $originalGravity
     * @param \Unitz\Gravity $finalGravity
     * @param \Unitz\Volume $volume
     * @return float
     */
    public static function calories(
        Gravity $originalGravity,
        Gravity $finalGravity,
        Volume $volume = new Volume(ounce: self::CALORIE_BASE_VOLUME_IN_OUNCE)
    ): float {
        $volumeMultiplier = $volume->getOunce() / self::CALORIE_BASE_VOLUME_IN_OUNCE;
        return $volumeMultiplier * ((6.9 * self::alcoholByWeight(
                        $originalGravity,
                        $finalGravity
                    )) + 4.0 * (self::realExtract(
                        $originalGravity,
                        $finalGravity
                    ) - 0.1)) * $finalGravity->getSpecificGravity() * 3.55;
    }

    /**
     * ABW
     *
     * @param \Unitz\Gravity $originalGravity
     * @param \Unitz\Gravity $finalGravity
     * @return float
     * @throws \RuntimeException
     */
    public static function alcoholByWeight(Gravity $originalGravity, Gravity $finalGravity): float
    {
        if ($finalGravity->getSpecificGravity() === 0.0) {
            throw new RuntimeException('Final Gravity cannot be zero');
        }

        return (0.79 * self::alcoholByVolume($originalGravity, $finalGravity)) / $finalGravity->getSpecificGravity();
    }

    /**
     * ABV
     *
     * Source: https://www.brewersfriend.com/abv-calculator/
     * Source: https://www.brewersfriend.com/2011/06/16/alcohol-by-volume-calculator-updated/
     *
     * @param \Unitz\Gravity $originalGravity
     * @param \Unitz\Gravity $finalGravity
     * @param string $formulaVersion
     * @return float
     * @throws \UnexpectedValueException
     */
    public static function alcoholByVolume(
        Gravity $originalGravity,
        Gravity $finalGravity,
        string $formulaVersion = self::ABV_ALTERNATE_FORMULA
    ): float {
        if ($formulaVersion === self::ABV_ALTERNATE_FORMULA) {
            return (76.08 * ($originalGravity->getSpecificGravity() - $finalGravity->getSpecificGravity(
                        )) / (1.775 - $originalGravity->getSpecificGravity())) * ($finalGravity->getSpecificGravity(
                    ) / 0.794);
        }

        if ($formulaVersion === self::ABV_STANDARD_FORMULA) {
            return ($originalGravity->getSpecificGravity() - $finalGravity->getSpecificGravity()) * 131.25;
        }

        throw new UnexpectedValueException('Invalid ABV formula version');
    }

    /**
     * Determine the Real Extract value.
     * https://beerandbrewing.com/dictionary/ewOeMFnY4x/
     *
     * @param \Unitz\Gravity $originalGravity
     * @param \Unitz\Gravity $finalGravity
     * @return float
     */
    public static function realExtract(Gravity $originalGravity, Gravity $finalGravity): float
    {
        return (0.1808 * $originalGravity->getPlato()) + (0.8192 * $finalGravity->getPlato());
    }

    /**
     * Apparent Degree of Fermentation (ADF)
     *
     * @param \Unitz\Gravity $originalGravity
     * @param \Unitz\Gravity $finalGravity
     * @return float
     */
    public static function apparentDegreeOfFermentation(Gravity $originalGravity, Gravity $finalGravity): float
    {
        if ($originalGravity->getSpecificGravity() <= 1.0) {
            throw new RuntimeException('Original Gravity cannot be less than 1.0');
        }

        return ($originalGravity->getSpecificGravity() - $finalGravity->getSpecificGravity(
                )) / ($originalGravity->getSpecificGravity() - 1);
    }

    /**
     * Gravity Correction based on Temperature of Sample and Hydrometer Calibration
     * Source: https://www.brewersfriend.com/hydrometer-temp/
     *
     * @param \Unitz\Temperature $sampleTemperature
     * @param \Unitz\Gravity $gravity
     * @param \Unitz\Temperature $calibrateTemperature //The temperature in which your hydrometer is calibrated to.
     * @return \Unitz\Gravity
     */
    public static function gravityCorrection(
        Temperature $sampleTemperature,
        Gravity $gravity,
        Temperature $calibrateTemperature = new Temperature(fahrenheit: self::DEFAULT_CALIBRATE_TEMPERATURE)
    ): Gravity {
        $sampleTemperatureFahrenheit = $sampleTemperature->getFahrenheit();
        $calibrateTemperatureFahrenheit = $calibrateTemperature->getFahrenheit();
        $specificGravity = $gravity->getSpecificGravity();

        $specificGravity *= ((1.00130346 - 0.000134722124 * $sampleTemperatureFahrenheit + 0.00000204052596 * ($sampleTemperatureFahrenheit ** 2) - 0.00000000232820948 * ($sampleTemperatureFahrenheit ** 3)) / (1.00130346 - 0.000134722124 * $calibrateTemperatureFahrenheit + 0.00000204052596 * ($calibrateTemperatureFahrenheit ** 2) - 0.00000000232820948 * ($calibrateTemperatureFahrenheit ** 3)));

        return new Gravity(specificGravity: $specificGravity);
    }
}