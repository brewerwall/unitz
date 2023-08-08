# Unitz

![example workflow](https://github.com/brewerwall/unitz/actions/workflows/main.yml/badge.svg)

### Introduction

Unitz is a way to address easy conversions among various brewing/fermentation units. A utility
that helps convert a unit to all types and not specifically addressing specific conversions.

### Installation

```bash
composer require brewerwall/unitz
```

### Single Type Use

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

### Service Provider Use

You can inject the UnitzService class into your application. Setting the user's preferences as an argument in the
constructor
will allow you to use the `getValue()` method to get the user's preferred unit of measure.

```php
// Instantiate a new UnitzService in a Service Provider Pattern
$unitService = new UnitzService(preferences: ['Temperature' => 'Celsius']);

// Dependency injection of UnitzService within the application
$temperature = $unitService->makeTemperature(fahrenheit: 72);

// Output of getValue() based on the user's preferences
$temperature->getValue(); // 22.222222222222

// Output of getValue() based on the user's preferences with rounding
$temperature->getValue(1); // 22.2
````

### User Centric Unit Creation

When setting a user's preference in the UnitService, you no longer need to specify what type of unit the user is
inputting by using the `userValue` argument in the constructor of the Unit. If the user's value needs to change,
the `setValue()` method will also accomplish the same idea.

```php
// Create a new Gravity Object
$gravity = new Gravity(userValue: 12, preferences: ['Gravity' => 'Brix']);

// Gets the Plato of our Gravity
$plato = $gravity->getPlato();

// Gets the Specific Gravity of our Gravity
$specificGravity = $gravity->getSpecificGravity();

// Gets the Brix of our Gravity
$brix = $gravity->getBrix();  // 12

// Gets our Preferred Unit of measure based on our preferences
$plato = $gravity->getValue(); // 12
```

### User Centric With Service Provider Use

```php
// Instantiate a new UnitzService in a Service Provider Pattern
$unitService = new UnitzService(preferences: ['Temperature' => 'Fahrenheit']);

// Dependency injection of UnitzService within the application and a user submitted form value
$temperature = $unitService->makeTemperature(userValue: 72);

// Output of getValue() based on the user's preferences
$temperature->getValue(); // 72

// Output of getCelsius() will return the same as getValue() since that's the user's preference
$temperature->getFahrenheit(); // 72

// Updating the user's temperature value will have the same effect.
$temperature->setValue(76);

$temperature->getValue(); // 76
$temperature->getFahrenheit(); // 76

// If then in the storage process you can specify the unit type you need
$temperature->getCelsius(); // 24.444444444444
````

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
    'Weight' => 'Pound',
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