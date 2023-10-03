<?php

namespace Unitz\Rate;

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;
use RuntimeException;
use Unitz\BaseUnitz;

abstract class AbstractRate
{
    private Inflector $inflector;
    private BaseUnitz $numerator;
    private BaseUnitz $denominator;

    public function __construct()
    {
        $this->inflector = InflectorFactory::create()->build();
    }

    /**
     * @param \Unitz\BaseUnitz $numerator
     * @return void
     */
    protected function setNumerator(BaseUnitz $numerator): void
    {
        $this->numerator = $numerator;
    }

    /**
     * @param \Unitz\BaseUnitz $denominator
     * @return void
     */
    protected function setDenominator(BaseUnitz $denominator): void
    {
        $this->denominator = $denominator;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return \Unitz\BaseUnitz
     */
    public function __call(string $name, array $arguments): BaseUnitz
    {
        $getPosition = strpos($name, 'get');
        if ($getPosition === false || $getPosition !== 0) {
            throw new RuntimeException('All methods must start with "get"');
        }

        $name = str_replace('get', '', $name);

        $perPosition = strpos($name, 'Per');
        if ($perPosition === false) {
            throw new RuntimeException('All methods must contain "Per" between the two units');
        }

        $units = array_filter(explode('Per', $name));
        if (count($units) !== 2) {
            throw new RuntimeException(
                'All methods must contain two units separated by "Per", get' . $name . '() has ' . count(
                    $units
                )
            );
        }

        $numeratorName = $this->inflector->singularize(ucfirst(strtolower($units[0])));
        $denominatorName = $this->inflector->singularize(ucfirst(strtolower($units[1])));

        if (!method_exists($this->numerator, "get$numeratorName")) {
            throw new RuntimeException("Method get$numeratorName does not exist on " . get_class($this->numerator));
        }
        $numerator = $this->numerator->{"get$numeratorName"}();

        if (!method_exists($this->denominator, "get$denominatorName")) {
            throw new RuntimeException(
                "Method get$denominatorName does not exist on " . get_class($this->denominator)
            );
        }
        $denominator = $this->denominator->{"get$denominatorName"}();

        $numeratorReflection = new \ReflectionClass($this->numerator);
        $unitsClassName = $numeratorReflection->getName();
        $unitsClassShortName = $numeratorReflection->getShortName();

        return (new $unitsClassName(preferences: [$unitsClassShortName => $numeratorName]))->{"set$numeratorName"}(
            $numerator / $denominator
        );
    }
}