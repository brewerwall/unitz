<?php

namespace Unitz;

use ReflectionClass;
use RuntimeException;

abstract class AbstractUnitz extends BaseUnitz
{
    /**
     * @param int|null $round
     * @return float
     * @throws \RuntimeException
     */
    public function getValue(?int $round = null): float
    {
        $gatherMethod = $this->makeGatherMethod();

        if (method_exists($this, $gatherMethod)) {
            return $this->$gatherMethod($round);
        }

        throw new RuntimeException("Unit '$gatherMethod' does not exist.");
    }

    /**
     * @param array $values
     * @return bool
     */
    public function hasOnlyOneValue(array $values): bool
    {
        $count = 0;
        foreach ($values as $value) {
            if (!is_null($value)) {
                $count++;
            }
        }

        return $count === 1;
    }

    /**
     * @return string
     * @throws \RuntimeException
     */
    private function makeGatherMethod(): string
    {
        $reflection = new ReflectionClass($this);
        $classname = $reflection->getShortName();

        if (array_key_exists($classname, $this->getPreferences())) {
            return 'get' . $this->getPreferences()[$classname];
        }

        throw new RuntimeException("Preference for '$classname' has not been set.");
    }
}