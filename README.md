# Unitz

### Installation

TDB

### Use

```php
// Create a new Gravity Object
$gravity = new Gravity(plato: 12, preferences: ['Gravity' => 'Plato']);

// Gets the Plato of our Gravity
$plato = $gravity->getPlato();

// Gets the Specific Gravity of our Gravity
$specificGravity = $gravity->getSpecificGravity();

// Gets the Brix of our Gravity
$brix = $gravity->getBrix();

// Gets our Preferred Unit of measure based on our preferences
$plato = $gravity->getValue();


```