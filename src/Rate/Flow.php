<?php

namespace Unitz\Rate;

use Unitz\Time;
use Unitz\Volume;

class Flow extends AbstractRate
{
    public const RETURNABLE_CLASS = 'Volume';

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