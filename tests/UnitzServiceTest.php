<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Unitz\Color;
use Unitz\Gravity;
use Unitz\Pressure;
use Unitz\Temperature;
use Unitz\UnitzService;
use Unitz\Volume;
use Unitz\Weight;

final class UnitzServiceTest extends TestCase
{
    private UnitzService $unitzService;

    public function setUp(): void
    {
        $this->unitzService = new UnitzService();
    }

    public function testMakeColorWillReturnColor(): void
    {
        $color = $this->unitzService->makeColor(srm: 12);
        $this->assertInstanceOf(Color::class, $color);
    }

    public function testMakeGravityWillReturnGravity(): void
    {
        $gravity = $this->unitzService->makeGravity(plato: 12);
        $this->assertInstanceOf(Gravity::class, $gravity);
    }

    public function testMakePressureWillReturnPressure(): void
    {
        $pressure = $this->unitzService->makePressure(bar: 12);
        $this->assertInstanceOf(Pressure::class, $pressure);
    }

    public function testMakeTemperatureWillReturnTemperature(): void
    {
        $temperature = $this->unitzService->makeTemperature(celsius: 12);
        $this->assertInstanceOf(Temperature::class, $temperature);
    }

    public function testMakeVolumeWillReturnVolume(): void
    {
        $volume = $this->unitzService->makeVolume(ounce: 12);
        $this->assertInstanceOf(Volume::class, $volume);
    }

    public function testMakeWeightWillReturnWeight(): void
    {
        $weight = $this->unitzService->makeWeight(ounce: 12);
        $this->assertInstanceOf(Weight::class, $weight);
    }
}