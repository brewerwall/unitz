# Unitz

![example workflow](https://github.com/brewerwall/unitz/actions/workflows/main.yml/badge.svg)

### Introduction

Unitz is a way to address easy conversions among various brewing/fermentation units. A utility
that helps convert a unit to all types and not specifically addressing specific conversions.

### Installation

```bash
composer require brewerwall/unitz
```

### Use

```php
// Create a new Gravity Object
$gravity = new Gravity(plato: 12);

// Gets the Plato of our Gravity
$plato = $gravity->getPlato();

// Gets the Specific Gravity of our Gravity
$specificGravity = $gravity->getSpecificGravity();

// Gets the Brix of our Gravity
$brix = $gravity->getBrix();

// Gets our Preferred Unit of measure based on our preferences
$plato = $gravity->getValue();


```

### Available Units

| Unit        | Types                                                               |
|-------------|---------------------------------------------------------------------|
| Gravity     | Plato<br/>SpecificGravity<br/>Brix                                  |
| Pressure    | Psi<br/>Bar                                                         |
| Temperature | Celsius<br/>Fahrenheit                                              |
| Volumne     | Ounce<br/>Gallon<br/>Barrel<br/>Milliliter<br/>Liter<br/>Hectoliter |
| Weight      | Ounce<br/>Pound<br/>Gram<br/>Kilogram                               |
| Color       | Srm<br/>Ebc<br/>Lovibond                                            |

### Preferences

By default, all units have a `getValue()` method that returns the users preference of unit type. There is a default
preference set, but can be overridden when instantiating a new unit.

##### Default

```php
[
    'Gravity' => 'Plato',
    'Temperature' => 'Fahrenheit',
    'Volume' => 'Gallon',
    'Pressure' => 'Psi',
    'Weight' => 'Pound'
    'Color' => 'Srm',
]
```

##### Example

```php
// Create a new Weight Object
$weight = new Weight(kilogram: 7.5, preferences: ['Weight' => 'Kilogram']);

// Returns Kilogram since that is the overridden preference
$kilogram = $weight->getValue();
```

### Rounding

In each type's get method, there is the option to pass in a precision of rounding. This also includes the `getValue()`
method that all units share.

```php
$weight = new Weight(kilogram: 7.5629145);

$kilogram = $weight->getKilogram(3);  // $kilogram = 7.563
```