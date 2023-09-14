<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
use Unitz\Distillate;
use Unitz\Volume;

class Spirit
{
    /**
     * The amount of water you need to add to a distillate to dilute it down to a desired distillate.
     *
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

    /**
     * Determines the Volume of distillate you will get with a specific wash abv and still efficiency.
     *
     * Source - https://www.hillbillystills.com/distilling-calculator
     *
     * @param \Unitz\Volume $volume
     * @param \Unitz\Distillate $wash
     * @param float $stillEfficiency
     * @return \Unitz\Volume
     */
    public static function distilledAlcoholVolume(
        Volume $volume,
        Distillate $wash,
        float $stillEfficiencyPercent
    ): Volume {
        if ($stillEfficiencyPercent === 0.0) {
            throw new InvalidArgumentException('Still Efficiency cannot be zero.');
        }

        return new Volume(
            liter: ((0.95 * $volume->getLiter() * $wash->getPercentAlcohol() / $stillEfficiencyPercent) * 100) / 100
        );
    }
}