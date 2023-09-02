<?php

namespace Unitz;

use InvalidArgumentException;

class Time extends AbstractUnitz
{
    private float $millisecond;
    private float $second;
    private float $minute;
    private float $hour;
    private float $day;
    private float $week;
    private float $month;
    private float $year;

    public function __construct(
        ?float $millisecond = null,
        ?float $second = null,
        ?float $minute = null,
        ?float $hour = null,
        ?float $day = null,
        ?float $week = null,
        ?float $month = null,
        ?float $year = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOnlyOneValue(
            [$millisecond, $second, $minute, $hour, $day, $week, $month, $year, $userValue]
        )) {
            throw new InvalidArgumentException('Only one Time type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($millisecond)) {
            $this->setMillisecond($millisecond);
        }

        if (is_numeric($second)) {
            $this->setSecond($second);
        }

        if (is_numeric($minute)) {
            $this->setMinute($minute);
        }

        if (is_numeric($hour)) {
            $this->setHour($hour);
        }

        if (is_numeric($day)) {
            $this->setDay($day);
        }

        if (is_numeric($week)) {
            $this->setWeek($week);
        }

        if (is_numeric($month)) {
            $this->setMonth($month);
        }

        if (is_numeric($year)) {
            $this->setYear($year);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    /**
     * @param float $millisecond
     * @return $this
     */
    public function setMillisecond(float $millisecond): self
    {
        $this->millisecond = $millisecond;
        $this->second = self::convertMillisecondToSecond($millisecond);
        $this->minute = self::convertSecondToMinute($this->second);
        $this->hour = self::convertMinuteToHour($this->minute);
        $this->day = self::convertHourToDay($this->hour);
        $this->week = self::convertDayToWeek($this->day);
        $this->month = self::convertDayToMonth($this->day);
        $this->year = self::convertDayToYear($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMillisecond(?int $round = null): float
    {
        return $round ? round($this->millisecond, $round) : $this->millisecond;
    }

    /**
     * @param float $second
     * @return $this
     */
    public function setSecond(float $second): self
    {
        $this->millisecond = self::convertSecondToMillisecond($second);
        $this->second = $second;
        $this->minute = self::convertSecondToMinute($second);
        $this->hour = self::convertMinuteToHour($this->minute);
        $this->day = self::convertHourToDay($this->hour);
        $this->week = self::convertDayToWeek($this->day);
        $this->month = self::convertDayToMonth($this->day);
        $this->year = self::convertDayToYear($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getSecond(?int $round = null): float
    {
        return $round ? round($this->second, $round) : $this->second;
    }

    /**
     * @param float $minute
     * @return $this
     */
    public function setMinute(float $minute): self
    {
        $this->minute = $minute;
        $this->second = self::convertMinuteToSecond($minute);
        $this->millisecond = self::convertSecondToMillisecond($this->second);
        $this->hour = self::convertMinuteToHour($minute);
        $this->day = self::convertHourToDay($this->hour);
        $this->week = self::convertDayToWeek($this->day);
        $this->month = self::convertDayToMonth($this->day);
        $this->year = self::convertDayToYear($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMinute(?int $round = null): float
    {
        return $round ? round($this->minute, $round) : $this->minute;
    }

    /**
     * @param float $hour
     * @return $this\
     */
    public function setHour(float $hour): self
    {
        $this->hour = $hour;
        $this->minute = self::convertHourToMinute($hour);
        $this->second = self::convertMinuteToSecond($this->minute);
        $this->millisecond = self::convertSecondToMillisecond($this->second);
        $this->day = self::convertHourToDay($hour);
        $this->week = self::convertDayToWeek($this->day);
        $this->month = self::convertDayToMonth($this->day);
        $this->year = self::convertDayToYear($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getHour(?int $round = null): float
    {
        return $round ? round($this->hour, $round) : $this->hour;
    }

    /**
     * @param float $day
     * @return $this
     */
    public function setDay(float $day): self
    {
        $this->day = $day;
        $this->hour = self::convertDayToHour($day);
        $this->minute = self::convertHourToMinute($this->hour);
        $this->second = self::convertMinuteToSecond($this->minute);
        $this->millisecond = self::convertSecondToMillisecond($this->second);
        $this->week = self::convertDayToWeek($day);
        $this->month = self::convertDayToMonth($day);
        $this->year = self::convertDayToYear($day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getDay(?int $round = null): float
    {
        return $round ? round($this->day, $round) : $this->day;
    }

    /**
     * @param float $week
     * @return $this
     */
    public function setWeek(float $week): self
    {
        $this->week = $week;
        $this->day = self::convertWeekToDay($week);
        $this->hour = self::convertDayToHour($this->day);
        $this->minute = self::convertHourToMinute($this->hour);
        $this->second = self::convertMinuteToSecond($this->minute);
        $this->millisecond = self::convertSecondToMillisecond($this->second);
        $this->month = self::convertDayToMonth($this->day);
        $this->year = self::convertDayToYear($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getWeek(?int $round = null): float
    {
        return $round ? round($this->week, $round) : $this->week;
    }

    /**
     * @param float $month
     * @return $this
     */
    public function setMonth(float $month): self
    {
        $this->month = $month;
        $this->day = self::convertMonthToDay($month);
        $this->hour = self::convertDayToHour($this->day);
        $this->minute = self::convertHourToMinute($this->hour);
        $this->second = self::convertMinuteToSecond($this->minute);
        $this->millisecond = self::convertSecondToMillisecond($this->second);
        $this->week = self::convertDayToWeek($this->day);
        $this->year = self::convertDayToYear($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMonth(?int $round = null): float
    {
        return $round ? round($this->month, $round) : $this->month;
    }

    /**
     * @param float $year
     * @return $this
     */
    public function setYear(float $year): self
    {
        $this->year = $year;
        $this->day = self::convertYearToDay($year);
        $this->hour = self::convertDayToHour($this->day);
        $this->minute = self::convertHourToMinute($this->hour);
        $this->second = self::convertMinuteToSecond($this->minute);
        $this->millisecond = self::convertSecondToMillisecond($this->second);
        $this->week = self::convertDayToWeek($this->day);
        $this->month = self::convertDayToMonth($this->day);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getYear(?int $round = null): float
    {
        return $round ? round($this->year, $round) : $this->year;
    }

    /**
     * @param float $millisecond
     * @return float
     */
    public static function convertMillisecondToSecond(float $millisecond): float
    {
        return $millisecond / 1000;
    }

    /**
     * @param float $second
     * @return float
     */
    public static function convertSecondToMillisecond(float $second): float
    {
        return $second * 1000;
    }

    /**
     * @param float $second
     * @return float
     */
    public static function convertSecondToMinute(float $second): float
    {
        return $second / 60;
    }

    /**
     * @param float $minute
     * @return float
     */
    public static function convertMinuteToSecond(float $minute): float
    {
        return $minute * 60;
    }

    /**
     * @param float $minute
     * @return float
     */
    public static function convertMinuteToHour(float $minute): float
    {
        return $minute / 60;
    }

    /**
     * @param float $hour
     * @return float
     */
    public static function convertHourToMinute(float $hour): float
    {
        return $hour * 60;
    }

    /**
     * @param float $hour
     * @return float
     */
    public static function convertHourToDay(float $hour): float
    {
        return $hour / 24;
    }

    /**
     * @param float $day
     * @return float
     */
    public static function convertDayToHour(float $day): float
    {
        return $day * 24;
    }

    /**
     * @param float $day
     * @return float
     */
    public static function convertDayToWeek(float $day): float
    {
        return $day / 7;
    }

    /**
     * @param float $week
     * @return float
     */
    public static function convertWeekToDay(float $week): float
    {
        return $week * 7;
    }

    /**
     * @param float $day
     * @return float
     */
    public static function convertDayToMonth(float $day): float
    {
        return $day / 30;
    }

    /**
     * @param float $month
     * @return float
     */
    public static function convertMonthToDay(float $month): float
    {
        return $month * 30;
    }

    /**
     * @param float $day
     * @return float
     */
    public static function convertDayToYear(float $day): float
    {
        return $day / 365;
    }

    /**
     * @param float $year
     * @return float
     */
    public static function convertYearToDay(float $year): float
    {
        return $year * 365;
    }
}