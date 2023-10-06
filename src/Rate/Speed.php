<?php

namespace Unitz\Rate;

use Unitz\Length;
use Unitz\Time;

/** Magic methods available through AbstractRate::__call()
 * @method Length getInchesPerMillisecond()
 * @method Length getInchesPerSecond()
 * @method Length getInchesPerMinute()
 * @method Length getInchesPerHour()
 * @method Length getInchesPerDay()
 * @method Length getInchesPerWeek()
 * @method Length getInchesPerMonth()
 * @method Length getInchesPerYear()
 * @method Length getFeetPerMillisecond()
 * @method Length getFeetPerSecond()
 * @method Length getFeetPerMinute()
 * @method Length getFeetPerHour()
 * @method Length getFeetPerDay()
 * @method Length getFeetPerWeek()
 * @method Length getFeetPerMonth()
 * @method Length getFeetPerYear()
 * @method Length getYardsPerMillisecond()
 * @method Length getYardsPerSecond()
 * @method Length getYardsPerMinute()
 * @method Length getYardsPerHour()
 * @method Length getYardsPerDay()
 * @method Length getYardsPerWeek()
 * @method Length getYardsPerMonth()
 * @method Length getYardsPerYear()
 * @method Length getMilesPerMillisecond()
 * @method Length getMilesPerSecond()
 * @method Length getMilesPerMinute()
 * @method Length getMilesPerHour()
 * @method Length getMilesPerDay()
 * @method Length getMilesPerWeek()
 * @method Length getMilesPerMonth()
 * @method Length getMilesPerYear()
 * @method Length getMillimetersPerMillisecond()
 * @method Length getMillimetersPerSecond()
 * @method Length getMillimetersPerMinute()
 * @method Length getMillimetersPerHour()
 * @method Length getMillimetersPerDay()
 * @method Length getMillimetersPerWeek()
 * @method Length getMillimetersPerMonth()
 * @method Length getMillimetersPerYear()
 * @method Length getCentimetersPerMillisecond()
 * @method Length getCentimetersPerSecond()
 * @method Length getCentimetersPerMinute()
 * @method Length getCentimetersPerHour()
 * @method Length getCentimetersPerDay()
 * @method Length getCentimetersPerWeek()
 * @method Length getCentimetersPerMonth()
 * @method Length getCentimetersPerYear()
 * @method Length getMetersPerMillisecond()
 * @method Length getMetersPerSecond()
 * @method Length getMetersPerMinute()
 * @method Length getMetersPerHour()
 * @method Length getMetersPerDay()
 * @method Length getMetersPerWeek()
 * @method Length getMetersPerMonth()
 * @method Length getMetersPerYear()
 * @method Length getKilometersPerMillisecond()
 * @method Length getKilometersPerSecond()
 * @method Length getKilometersPerMinute()
 * @method Length getKilometersPerHour()
 * @method Length getKilometersPerDay()
 * @method Length getKilometersPerWeek()
 * @method Length getKilometersPerMonth()
 * @method Length getKilometersPerYear()
 */
class Speed extends AbstractRate
{
    public function __construct(private readonly Length $length, private readonly Time $time)
    {
        parent::__construct();
        $this->setNumerator($length);
        $this->setDenominator($time);
    }

    /**
     * @return \Unitz\Length
     */
    public function getLength(): Length
    {
        return $this->length;
    }

    /**
     * @return \Unitz\Time
     */
    public function getTime(): Time
    {
        return $this->time;
    }
}