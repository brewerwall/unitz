<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
use Unitz\Volume;
use Unitz\Weight;

class Water
{
    /**
     * @param \Unitz\Weight $salt
     * @param \Unitz\Volume $water
     * @return float
     * @throws \RuntimeException
     */
    public static function partsPerMillion(Weight $salt, Volume $water): float
    {
        if ($water->getMilliliter() === 0.0) {
            throw new InvalidArgumentException('Water volume cannot be zero.');
        }

        return ($salt->getGram() / $water->getMilliliter()) * 1000000;
    }
}

