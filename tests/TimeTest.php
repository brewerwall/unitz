<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Time;

final class TimeTest extends TestCase
{
    public const TEST_MILLISECOND = 3628800000;
    public const TEST_SECOND = 3628800;
    public const TEST_MINUTE = 60480;
    public const TEST_HOUR = 1008;
    public const TEST_DAY = 42;
    public const TEST_WEEK = 6;
    public const TEST_MONTH = 1.4;
    public const TEST_YEAR = 0.11666666666666667;

    public function testSetMinuteWillReturnMinuteWithGetValueAndDefaultPreferences(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getValue();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    // Millisecond Conversions

    public function testSetMillisecondWillReturnMillisecondWithGetMillisecond(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnMinuteWithGetMinute(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnSecondWithGetSecond(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnHourWithGetHour(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnDayWithGetDay(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnMonthWithGetMonth(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnYearWithGetYear(): void
    {
        $gravity = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $gravity->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    // Minute Conversions

    public function testSetMinuteWillReturnMinuteWithGetMinute(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnMillisecondWithGetMillisecond(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnSecondWithGetSecond(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnHourWithGetHour(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnDayWithGetDay(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnMonthWithGetMonth(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnYearWithGetYear(): void
    {
        $gravity = new Time(minute: self::TEST_MINUTE);
        $actual = $gravity->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }
}