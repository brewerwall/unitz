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
        $getterMethod = $this->makeGetterMethod();

        if (method_exists($this, $getterMethod)) {
            return $this->$getterMethod($round);
        }

        throw new RuntimeException("Unit '$getterMethod' does not exist.");
    }

    /**
     * @param float $value
     * @return self
     * @throws \RuntimeException
     */
    public function setValue(float $value): self
    {
        $setterMethod = $this->makeSetterMethod();

        if (method_exists($this, $setterMethod)) {
            return $this->$setterMethod($value);
        }

        throw new RuntimeException("Unit '$setterMethod' does not exist.");
    }

    /**
     * @param array $values
     * @return bool
     */
    protected function hasOnlyOneValue(array $values): bool
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
    private function makeGetterMethod(): string
    {
        return $this->makeMethod('get');
    }

    /**
     * @return string
     * @throws \RuntimeException
     */
    private function makeSetterMethod(): string
    {
        return $this->makeMethod('set');
    }

    /**
     * @param string $prefix
     * @return string
     * @throws \RuntimeException
     */
    private function makeMethod(string $prefix): string
    {
        $reflection = new ReflectionClass($this);
        $classname = $reflection->getShortName();

        if (array_key_exists($classname, $this->getPreferences())) {
            return $prefix . $this->getPreferences()[$classname];
        }

        throw new RuntimeException("Preference for '$classname' has not been set.");
    }
}