<?php

namespace Unitz;

abstract class AbstractUnit
{
    public const DEFAULT_PREFERENCES = [
        'Gravity' => 'Plato',
    ];

    private array $preferences;

    public function __construct(array $preferences = [])
    {
        $this->preferences = array_merge($preferences, self::DEFAULT_PREFERENCES);
    }

    /**
     * @param int|null $round
     * @return float
     * @throws \Exception
     */
    public function getValue(int $round = null): float
    {
        $gatherMethod = $this->makeGatherMethod();

        return $round ? $this->$gatherMethod($round) : $this->$gatherMethod();
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function makeGatherMethod(): string
    {
        $reflection = new \ReflectionClass($this);
        $classname = $reflection->getShortName();

        if (array_key_exists($classname, $this->preferences)) {
            return 'get' . $this->preferences[$classname];
        }

        throw new \Exception("Preference for $classname has not been set.");
    }
}