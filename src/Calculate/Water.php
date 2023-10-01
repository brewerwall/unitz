<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
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
}

