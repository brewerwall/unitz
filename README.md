# Unitz

![example workflow](https://github.com/brewerwall/unitz/actions/workflows/main.yml/badge.svg)

## Introduction

Unitz is a way to address easy conversions among various brewing/fermentation units. A utility
that helps convert a unit to all types and agnostic to what type of unit it is.

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

// Gets the Brix of our Gravity
$brix = $gravity->getBrix();  // 12

// Gets our Preferred Unit of measure based on our preferences
$plato = $gravity->getValue(); // 12
```

### User Centric With Service Provider

```php
// Instantiate a new UnitzService in a Service Provider Pattern
$unitService = new UnitzService(preferences: ['Temperature' => 'Fahrenheit']);

// Dependency injection of UnitzService within the application and a user submitted form value
$temperature = $unitService->makeTemperature(userValue: 72);

// Output of getValue() based on the user's preferences
$temperature->getValue(); // 72

// Output of getFahrenheit() will return the same as getValue() since it's the user's preference
$temperature->getFahrenheit(); // 72

// Updating the user's temperature value will have the same effect.
$temperature->setValue(76);

// Values update as needed
$temperature->getValue(); // 76
$temperature->getFahrenheit(); // 76
````

### Available Units

| Unit        | Types                                                                          |
|-------------|--------------------------------------------------------------------------------|
| Gravity     | Plato<br/>SpecificGravity<br/>Brix                                             |
| Pressure    | Psi<br/>Bar                                                                    |
| Temperature | Celsius<br/>Fahrenheit                                                         |
| Volumne     | Ounce<br/>Gallon<br/>Barrel<br/>Milliliter<br/>Liter<br/>Hectoliter            |
| Weight      | Ounce<br/>Pound<br/>Gram<br/>Kilogram                                          |
| Color       | Srm<br/>Ebc<br/>Lovibond                                                       |
| Time        | Millisecond<br/>Second<br/>Minute<br/>Hour<br/>Day<br/>Week<br/>Month<br/>Year |

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
    'Time' => 'Minute',
];
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

## Calculate

A library of calculations that can be used with various Unitz classes.

### Beer

This class will calculate Beer related calculations.
___

#### Alcohol By Volume (ABV)

Alcohol By Volume (ABV) is the alcohol content of the beer based on the original gravity, final gravity and formula
version.
Source of equation is
at [Brewer's Friend](https://www.brewersfriend.com/2011/06/16/alcohol-by-volume-calculator-updated/).

```php
Beer::alcoholByVolume(Gravity $originalGravity, Gravity $finalGravity, string $formulaVersion = Beer::ABV_ALTERNATE_FORMULA): float
```

##### Arguments

- `Gravity $originalGravity` - Original Gravity of the beer
- `Gravity $finalGravity` - Final Gravity of the beer
- `string $formulaVersion` - Formula ABV calculation: `Beer::ABV_STANDARD_FORMULA`
  or `Beer::ABV_ALTERNATE_FORMULA`

##### Returns

- `float` - Alcohol By Volume (ABV) Value

---

#### Standard Reference Method (SRM)

Standard Reference Method (SRM) is the final color of a beer based on the weight of grain, color of
grain, and volume of water.

```php
Beer::standardReferenceMethod(Weight $weight, Color $color, Volume $volume): Color
```

##### Arguments

- `Weight $weight` - Weight of the grain
- `Color $color` - Color of the grain
- `Volume $volume` - Volume of the water

##### Returns

- `Unitz/Color` - Color (Color) Value

---

#### Malt Color Unit (MCU)

Malt Color Units (MCU) is the color of each grain times the grain weight in pounds divided by the batch volume in
gallons.

```php
Beer::maltColorUnit(Weight $weight, Color $color, Volume $volume): float
```

##### Arguments

- `Weight $weight` - Weight of the grain
- `Color $color` - Color of the grain
- `Volume $volume` - Volume of the water

##### Returns

- `float` - Malt Color Unit (MCU) Value

---

#### International Bitterness Units (IBU)

International Bitterness Units (IBU) is the bitterness of the beer based on the alpha acid of the
hops, weight of the hops, time in the boil, gravity of the wort, and volume of the wort.

```php
Beer::internationalBitternessUnits(float $alphaAcid, Weight $weight, Time $time, Gravity $gravity, Volume $volume)
```

##### Arguments

- `float $alphaAcid` - Alpha Acid of the hops
- `Weight $weight` - Weight of the hops
- `Time $time` - Time in the boil
- `Gravity $gravity` - Gravity of the wort
- `Volume $volume` - Volume of the wort

##### Returns

- `float` - International Bitterness Units (IBU) Value

---

#### Alpha Acid Units (AAU)

Alpha Acid Units (AAU) is the potential bitterness of the hops based on the alpha acid and weight.

```php
Beer::alphaAcidUnit(float $alphaAcid, Weight $weight): float
```

##### Arguments

- `float $alphaAcid` - Alpha Acid of the hops
- `Weight $weight` - Weight of the hops

##### Returns

- `float` - Alpha Acid Units (AAU) Value

---

#### Hop Utilization

This is a hop utilization factor based on the Tinseth formula derived
by [Glenn Tinseth](https://beersmith.com/blog/2011/02/10/beer-bitterness-and-ibus-with-glenn-tinseth-bshb-podcast-9/]).

```php
Beer::hopUtilization(Time $time, Gravity $gravity)
```

##### Arguments

- `Time $time` - Time in the boil
- `Gravity $gravity` - Gravity of the wort

##### Returns

- `float` - Hop Utilization Value

---

#### Calories

Determines th number of calories in a beer based on the original gravity, final gravity and the volume of the
beer consumed.

```php
Beer::calories(Gravity $originalGravity, Gravity $finalGravity, Volume $volume)
```

##### Arguments

- `Gravity $originalGravity` - Original Gravity of the beer
- `Gravity $finalGravity` - Final Gravity of the beer
- `Volume $volume` - Volume of the beer consumed

##### Returns

- `float` - Calories

---