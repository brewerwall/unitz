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
        $this->preferences = array_merge($preferences, self::DEFAULT_PREFERENCES);
    }

    public function getPreferences(): array
    {
        return $this->preferences;
    }
}