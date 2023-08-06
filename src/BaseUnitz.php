<?php

namespace Unitz;

class BaseUnitz
{
    public const DEFAULT_PREFERENCES = [
        'Gravity' => 'Plato',
        'Temperature' => 'Fahrenheit',
        'Volume' => 'Gallon',
        'Pressure' => 'Psi',
        'Weight' => 'Pound',
        'Color' => 'Srm',
    ];

    private array $preferences;

    public function __construct(array $preferences = [])
    {
        $this->preferences = array_merge(self::DEFAULT_PREFERENCES, $preferences);
    }

    public function getPreferences(): array
    {
        return $this->preferences;
    }
}