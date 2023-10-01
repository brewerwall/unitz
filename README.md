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
| Volume      | Ounce<br/>Gallon<br/>Barrel<br/>Milliliter<br/>Liter<br/>Hectoliter            |
| Weight      | Ounce<br/>Pound<br/>Gram<br/>Kilogram                                          |
| Color       | Srm<br/>Ebc<br/>Lovibond                                                       |
| Time        | Millisecond<br/>Second<br/>Minute<br/>Hour<br/>Day<br/>Week<br/>Month<br/>Year |
| Distillate  | Proof<br/>Alcohol Percent                                                      |

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
    'Distillate' => 'Proof',
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

Alcohol By Volume (ABV) is the percent of alcohol content in the beer based on the original gravity, final gravity and
formula version. Source of equation is
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

#### Alcohol By Weight (ABW)

Alcohol By Weight (ABW) is weighing the amount of alcohol in a fixed volume of liquid and comparing it to the weight of
pure water based on the original gravity and final gravity.

```php
Beer::alcoholByWeight(Gravity $originalGravity, Gravity $finalGravity): float
```

##### Arguments

- `Gravity $originalGravity` - Original Gravity of the beer
- `Gravity $finalGravity` - Final Gravity of the beer

##### Returns

- `float` - Alcohol By Weight (ABW) Value

---

#### Standard Reference Method (SRM)

Standard Reference Method (Srm) is the method for color assessment of wort or beer as published in the recommended
methods of the American Society of Brewing Chemists

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

Malt Color Unit (MCU) is an equation that helps determine what color a beer would be.

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

Based off Palmer's Calculation

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

Determines the number of calories in a finished beer based on the original gravity, final gravity and the volume of the
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

#### Real Extract

Real Extract (RE) is a precise calculation concerning the gravity of beer.
Source of equation is [Craft Beer & Brewing](https://beerandbrewing.com/dictionary/ewOeMFnY4x/)

```php
Beer::realExtract(Gravity $originalGravity, Gravity $finalGravity)
```

##### Arguments

- `Gravity $originalGravity` - Original Gravity of the beer
- `Gravity $finalGravity` - Final Gravity of the beer

##### Returns

- `float` - Real Extract

---

#### Apparent Degree of Fermentation

Apparent Degree of Fermentation (ADF) is a measure of the amount of sugar that has been converted to alcohol and carbon
dioxide by yeast during fermentation

```php
Beer::apparentDegreeOfFermentation(Gravity $originalGravity, Gravity $finalGravity)
```

##### Arguments

- `Gravity $originalGravity` - Original Gravity of the beer
- `Gravity $finalGravity` - Final Gravity of the beer

##### Returns

- `float` - Apparent Degree of Fermentation

---

#### Gravity Correction

Gravity Correction based on Temperature of Sample and Hydrometer Calibration.
Source [Brewers Friend](https://www.brewersfriend.com/hydrometer-temp/)

```php
Beer::gravityCorrection(Gravity $gravity, Temperature $temperature, Temperature $calibrationTemperature)
```

##### Arguments

- `Gravity $gravity` - Gravity of the Sample
- `Temperature $temperature` - Temperature of the sample
- `Temperature $calibrationTemperature` - Temperature hydrometer is calibrated to

##### Returns

- `Gravity` - Corrected Gravity of Sample

### Spirit

This class will calculate Spirit related calculations.
___

#### Dilute Down To Desired Proof

Dilute Down To Desired Proof is a calculation to determine how much water to add to a spirit to get to a desired proof.

```php
Spirit::diluteDownToDesiredProof(Proof $currentProof, Proof $desiredProof, Volume $currentVolume): Volume
```

##### Arguments

- `Proof $currentProof` - Current Proof of the spirit
- `Proof $desiredProof` - Desired Proof of the spirit
- `Volume $currentVolume` - Current Volume of the spirit

##### Returns

- `Volume` - Volume of water to add to the spirit

---

#### Distilled Alcohol Volume

Distilled Alcohol Volume is a calculation to determine the volume of alcohol distilled depending on the wash abv and
still efficiency.

```php
Spirit::distilledAlcoholVolume(Volume $volume, Distillate $wash, float $stillEfficiencyPercent): Volume
```

##### Arguments

- `Volume $volume` - Volume of the wash
- `Distillate $wash` - Distillate of the wash
- `float $stillEfficiencyPercent` - Still efficiency percentage

##### Returns

- `Volume` - Volume of the distilled alcohol

---

#### Distilled Remaining Water Volume

Distilled Remaining Water Volume is a calculation to determine the volume of water remaining after distilling a spirit.

```php
Spirit::distilledRemainingWaterVolume(Volume $volume, Distillate $wash, float $stillEfficiencyPercent): Volume
```

##### Arguments

- `Volume $volume` - Volume of the wash
- `Distillate $wash` - Distillate of the wash
- `float $stillEfficiencyPercent` - Still efficiency percentage

##### Returns

- `Volume` - Volume of the remaining water

### Water

This class will calculate Water related calculations.
___

#### Parts Per Million (PPM)

Parts Per Million (PPM) is a calculation to determine the amount of a substance in a solution.

```php
Water::partsPerMillion(float $amount, Volume $volume): float
```

##### Arguments

- `Weight $substance` - Weight of the substance
- `Volume $volume` - Volume of the water

##### Returns

- `float` - Parts Per Million (PPM) Value