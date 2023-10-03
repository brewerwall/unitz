<?php

namespace Unitz\Rate;

use Unitz\Time;
use Unitz\Volume;

/** Magic methods available through AbstractRate::__call()
 * @method Volume getOuncesPerMillisecond()
 * @method Volume getOuncesPerSecond()
 * @method Volume getOuncesPerMinute()
 * @method Volume getOuncesPerHour()
 * @method Volume getOuncesPerDay()
 * @method Volume getOuncesPerWeek()
 * @method Volume getOuncesPerMonth()
 * @method Volume getOuncesPerYear()
 * @method Volume getGallonsPerMillisecond
 * @method Volume getGallonsPerSecond()
 * @method Volume getGallonsPerMinute()
 * @method Volume getGallonsPerHour()
 * @method Volume getGallonsPerDay()
 * @method Volume getGallonsPerWeek()
 * @method Volume getGallonsPerMonth()
 * @method Volume getGallonsPerYear()
 * @method Volume getLitersPerMillisecond()
 * @method Volume getLitersPerSecond()
 * @method Volume getLitersPerMinute()
 * @method Volume getLitersPerHour()
 * @method Volume getLitersPerDay()
 * @method Volume getLitersPerWeek()
 * @method Volume getLitersPerMonth()
 * @method Volume getLitersPerYear()
 * @method Volume getMillilitersPerMillisecond()
 * @method Volume getMillilitersPerSecond()
 * @method Volume getMillilitersPerMinute()
 * @method Volume getMillilitersPerHour()
 * @method Volume getMillilitersPerDay()
 * @method Volume getMillilitersPerWeek()
 * @method Volume getMillilitersPerMonth()
 * @method Volume getMillilitersPerYear()
 * @method Volume getHectolitersPerMillisecond
 * @method Volume getHectolitersPerSecond()
 * @method Volume getHectolitersPerMinute()
 * @method Volume getHectolitersPerHour()
 * @method Volume getHectolitersPerDay()
 * @method Volume getHectolitersPerWeek()
 * @method Volume getHectolitersPerMonth()
 * @method Volume getHectolitersPerYear()
 * @method Volume getBarrelsPerSecond()
 * @method Volume getBarrelsPerMinute()
 * @method Volume getBarrelsPerHour()
 * @method Volume getBarrelsPerDay()
 * @method Volume getBarrelsPerWeek()
 * @method Volume getBarrelsPerMonth()
 * @method Volume getBarrelsPerYear()
 */
class Flow extends AbstractRate
{
    public function __construct(private readonly Volume $volume, private readonly Time $time)
    {
        parent::__construct();
        $this->setNumerator($volume);
        $this->setDenominator($time);
    }

    /**
     * @return \Unitz\Volume
     */
    public function getVolume(): Volume
    {
        return $this->volume;
    }

    /**
     * @return \Unitz\Time
     */
    public function getTime(): Time
    {
        return $this->time;
    }
}