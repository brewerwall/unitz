<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
use Unitz\Distillate;
use Unitz\Volume;

class Spirit
{
    /**
     * @param \Unitz\Distillate $current
     * @param \Unitz\Distillate $desired
     * @param \Unitz\Volume $distillateVolume
     * @return \Unitz\Volume
     * @throws \RuntimeException
     */
    public static function diluteDownToDesiredProof(
        Distillate $current,
        Distillate $desired,
        Volume $distillateVolume
    ): Volume {
        if ($current->getPercentAlcohol() < $desired->getPercentAlcohol()) {
            throw new InvalidArgumentException('Current distillate cannot be less than desired distillate.');
        }

        return new Volume(
            liter: $distillateVolume->getLiter() * (($current->getPercentAlcohol() / $desired->getPercentAlcohol()) - 1)
        );
    }
}