<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
use Unitz\Rate\Boil;
use Unitz\Time;
use Unitz\Volume;
use Unitz\Weight;

class Water
{
    /**
     * Parts Per Million (PPM)
     *
     * Determines the Parts Per Million (PPM) of a substance in a solution.
     *
     * @param \Unitz\Weight $substance
     * @param \Unitz\Volume $water
     * @return float
     * @throws \RuntimeException
     */
    public static function partsPerMillion(Weight $substance, Volume $water): float
    {
        if ($water->getMilliliter() === 0.0) {
            throw new InvalidArgumentException('Water volume cannot be zero.');
        }

        return ($substance->getGram() / $water->getMilliliter()) * 1000000;
    }

    /**
     * Boil Off Volume
     *
     * Gets the Volume of solution based on the Boil Rate and Time
     *
     * @param \Unitz\Rate\Boil $boilRate
     * @param \Unitz\Time $time
     * @return \Unitz\Volume
     */
    public static function boilOffVolume(Boil $boilRate, Time $time): Volume
    {
        return new Volume(gallon: $boilRate->getGallonsPerHour()->getGallon() * $time->getHour());
    }

    /**
     * Post Boil Volume
     *
     * Gets the post boil volume of solution
     *
     * @param \Unitz\Volume $preBoilVolume
     * @param \Unitz\Rate\Boil $boilRate
     * @param \Unitz\Time $time
     * @return \Unitz\Volume
     */
    public static function postBoilVolume(Volume $preBoilVolume, Boil $boilRate, Time $time): Volume
    {
        return new Volume(gallon: $preBoilVolume->getGallon() - self::boilOffVolume($boilRate, $time)->getGallon());
    }
}

