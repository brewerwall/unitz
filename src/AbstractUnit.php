<?php

namespace Unitz;

use ReflectionClass;
use RuntimeException;

abstract class AbstractUnit
{
    public const DEFAULT_PREFERENCES = [
        'Gravity' => 'Plato',
        'Temperature' => 'Fahrenheit'
    ];

    private array $preferences;

    public function __construct(array $preferences = [])
    {
        $this->preferences = array_merge($preferences, self::DEFAULT_PREFERENCES);
    }

    /**
     * @param int|null $round
     * @return float
     * @throws \RuntimeException
     */
    public function getValue(int $round = null): float
    {
        $gatherMethod = $this->makeGatherMethod();

        if (method_exists($this, $gatherMethod)) {
            return $round ? $this->$gatherMethod($round) : $this->$gatherMethod();
        }

        throw new RuntimeException("Unit '$gatherMethod' does not exist.");
    }

    /**
     * @return string
     * @throws \RuntimeException
     */
    private function makeGatherMethod(): string
    {
        $reflection = new ReflectionClass($this);
        $classname = $reflection->getShortName();

        if (array_key_exists($classname, $this->preferences)) {
            return 'get' . $this->preferences[$classname];
        }

        throw new RuntimeException("Preference for '$classname' has not been set.");
    }
}