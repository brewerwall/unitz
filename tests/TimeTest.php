<?php

namespace Unitz\Tests;

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
    public const TEST_YEAR = 0.11506849315068493;

    public function testSetMinuteWillReturnMinuteWithGetValueAndDefaultPreferences(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getValue();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    // Millisecond Conversions

    public function testSetMillisecondWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnHourWithGetHour(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnDayWithGetDay(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMillisecondWillReturnYearWithGetYear(): void
    {
        $time = new Time(millisecond: self::TEST_MILLISECOND);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Second Conversions

    public function testSetSecondWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnHourWithGetHour(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnDayWithGetDay(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetSecondWillReturnYearWithGetYear(): void
    {
        $time = new Time(second: self::TEST_SECOND);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Minute Conversions

    public function testSetMinuteWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnHourWithGetHour(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnDayWithGetDay(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMinuteWillReturnYearWithGetYear(): void
    {
        $time = new Time(minute: self::TEST_MINUTE);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Hour Conversions

    public function testSetHourWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnHourWithGetHour(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnDayWithGetDay(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetHourWillReturnYearWithGetYear(): void
    {
        $time = new Time(hour: self::TEST_HOUR);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Day Conversions

    public function testSetDayWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnHourWithGetHour(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnDayWithGetDay(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetDayWillReturnYearWithGetYear(): void
    {
        $time = new Time(day: self::TEST_DAY);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Week Conversions

    public function testSetWeekWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnHourWithGetHour(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnDayWithGetDay(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetWeekWillReturnYearWithGetYear(): void
    {
        $time = new Time(week: self::TEST_WEEK);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Month Conversions

    public function testSetMonthWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnHourWithGetHour(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnDayWithGetDay(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetMonthWillReturnYearWithGetYear(): void
    {
        $time = new Time(month: self::TEST_MONTH);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }

    // Year Conversions

    public function testSetYearWillReturnMinuteWithGetMinute(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getMinute();
        $expected = self::TEST_MINUTE;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnMillisecondWithGetMillisecond(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getMillisecond();
        $expected = self::TEST_MILLISECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnSecondWithGetSecond(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getSecond();
        $expected = self::TEST_SECOND;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnHourWithGetHour(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getHour();
        $expected = self::TEST_HOUR;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnDayWithGetDay(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getDay();
        $expected = self::TEST_DAY;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnWeekWithGetWeek(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getWeek();
        $expected = self::TEST_WEEK;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnMonthWithGetMonth(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getMonth();
        $expected = self::TEST_MONTH;

        $this->assertEquals($expected, $actual);
    }

    public function testSetYearWillReturnYearWithGetYear(): void
    {
        $time = new Time(year: self::TEST_YEAR);
        $actual = $time->getYear();
        $expected = self::TEST_YEAR;

        $this->assertEquals($expected, $actual);
    }
}