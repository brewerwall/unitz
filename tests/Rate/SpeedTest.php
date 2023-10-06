<?php

namespace Unitz\Tests\Rate;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Unitz\Length;
use Unitz\Rate\Speed;
use Unitz\Time;

final class SpeedTest extends TestCase
{
    public function testSpeedWithMissingGetPrefixThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must start with "get"');

        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $flow->gimmeGallonsPerMinute();
    }

    public function testSpeedWithMissingPerDividerThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must contain "Per" between the two units');

        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $flow->getFeetByMinute();
    }

    public function testSpeedWithMissingFirstUnitThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must contain two units separated by "Per", getPerMinute() has 1');

        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $flow->getPerMinute();
    }

    public function testSpeedWithMissingSecondUnitThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must contain two units separated by "Per", getFeetPer() has 1');

        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $flow->getFeetPer();
    }

    public function testSpeedWithInvalidNumeratorUnitTypeThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Method getMonkey does not exist on Unitz\Length');

        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $flow->getMonkeysPerMinute();
    }

    public function testSpeedWithInvalidDenominatorUnitTypeThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Method getBanana does not exist on Unitz\Time');

        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $flow->getFeetPerBananas();
    }

    public function testSpeedReturnsCorrectValue(): void
    {
        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $this->assertEquals(new Length(foot: 3), $flow->getFeetPerMinute());
    }

    public function testSpeedReturnsCorrectValueWithDifferentUnitsOfTime(): void
    {
        $flow = new Speed(new Length(foot: 3), new Time(minute: 1));
        $this->assertEquals(new Length(foot: 180), $flow->getFeetPerHour());
    }
}