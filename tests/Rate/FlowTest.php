<?php

namespace Unitz\Tests\Rate;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Unitz\Rate\Flow;
use Unitz\Time;
use Unitz\Volume;

class FlowTest extends TestCase
{
    public function testFlowWithMissingGetPrefixThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must start with "get"');

        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $flow->gimmeGallonsPerMinute();
    }

    public function testFlowWithMissingPerDividerThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must contain "Per" between the two units');

        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $flow->getGallonsByMinute();
    }

    public function testFlowWithMissingFirstUnitThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must contain two units separated by "Per", getPerMinute() has 1');

        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $flow->getPerMinute();
    }

    public function testFlowWithMissingSecondUnitThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('All methods must contain two units separated by "Per", getGallonsPer() has 1');

        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $flow->getGallonsPer();
    }

    public function testFlowWithInvalidNumeratorUnitTypeThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Method getMonkey does not exist on Unitz\Volume');

        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $flow->getMonkeysPerMinute();
    }

    public function testFlowWithInvalidDenominatorUnitTypeThrowsRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Method getBanana does not exist on Unitz\Time');

        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $flow->getGallonsPerBananas();
    }

    public function testFlowReturnsCorrectValue(): void
    {
        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $this->assertEquals(new Volume(gallon: 3), $flow->getGallonsPerMinute());
    }

    public function testFlowReturnsCorrectValueWithDifferentUnitsOfTime(): void
    {
        $flow = new Flow(new Volume(gallon: 3), new Time(minute: 1));
        $this->assertEquals(new Volume(gallon: 180), $flow->getGallonsPerHour());
    }
}