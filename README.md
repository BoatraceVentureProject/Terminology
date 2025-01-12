# Terminology in the Boatrace Venture Project

[![Build Status](https://github.com/BoatraceVentureProject/Terminology/workflows/Tests/badge.svg)](https://github.com/BoatraceVentureProject/Terminology/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/BoatraceVentureProject/Terminology/graph/badge.svg?token=QIPURI4UD9)](https://codecov.io/gh/BoatraceVentureProject/Terminology)
[![Latest Stable Version](https://poser.pugx.org/bvp/terminology/v/stable)](https://packagist.org/packages/bvp/terminology)
[![Latest Unstable Version](https://poser.pugx.org/bvp/terminology/v/unstable)](https://packagist.org/packages/bvp/terminology)
[![License](https://poser.pugx.org/bvp/terminology/license)](https://packagist.org/packages/bvp/terminology)

## Installation
```bash
composer require bvp/terminology
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Venture\Project\Terminology;

$collection = Terminology::classById(2);
var_dump($collection->get('id')); // int(2)
var_dump($collection->get('name')); // string(5) "A2級"
var_dump($collection->get('short_name')); // string(2) "A2"

$collection = Terminology::classByName('A2級');
var_dump($collection->get('id')); // int(2)
var_dump($collection->get('name')); // string(5) "A2級"
var_dump($collection->get('short_name')); // string(2) "A2"

$collection = Terminology::classByShortName('A2');
var_dump($collection->get('id')); // int(2)
var_dump($collection->get('name')); // string(5) "A2級"
var_dump($collection->get('short_name')); // string(2) "A2"

$collection = Terminology::directionById(7);
var_dump($collection->get('id')); // int(7)
var_dump($collection->get('name')); // string(6) "南東"
var_dump($collection->get('short_name')); // string(3) "↘"

$collection = Terminology::directionByName('南東');
var_dump($collection->get('id')); // int(7)
var_dump($collection->get('name')); // string(6) "南東"
var_dump($collection->get('short_name')); // string(3) "↘"

$collection = Terminology::directionByShortName('↘');
var_dump($collection->get('id')); // int(7)
var_dump($collection->get('name')); // string(6) "南東"
var_dump($collection->get('short_name')); // string(3) "↘"

$collection = Terminology::placeById(14);
var_dump($collection->get('id')); // int(14)
var_dump($collection->get('name')); // string(15) "フライング"
var_dump($collection->get('short_name')); // string(1) "F"

$collection = Terminology::placeByName('フライング');
var_dump($collection->get('id')); // int(14)
var_dump($collection->get('name')); // string(15) "フライング"
var_dump($collection->get('short_name')); // string(1) "F"

$collection = Terminology::placeByShortName('F');
var_dump($collection->get('id')); // int(14)
var_dump($collection->get('name')); // string(15) "フライング"
var_dump($collection->get('short_name')); // string(1) "F"

$collection = Terminology::techniqueById(4);
var_dump($collection->get('id')); // int(4)
var_dump($collection->get('name')); // string(15) "まくり差し"
var_dump($collection->get('short_name')); // string(6) "ま差"

$collection = Terminology::techniqueByName('まくり差し');
var_dump($collection->get('id')); // int(4)
var_dump($collection->get('name')); // string(15) "まくり差し"
var_dump($collection->get('short_name')); // string(6) "ま差"

$collection = Terminology::techniqueByShortName('ま差');
var_dump($collection->get('id')); // int(4)
var_dump($collection->get('name')); // string(15) "まくり差し"
var_dump($collection->get('short_name')); // string(6) "ま差"

$collection = Terminology::weatherById(2);
var_dump($collection->get('id')); // int(2)
var_dump($collection->get('name')); // string(6) "曇り"
var_dump($collection->get('short_name')); // string(3) "曇"

$collection = Terminology::weatherByName('曇り');
var_dump($collection->get('id')); // int(2)
var_dump($collection->get('name')); // string(6) "曇り"
var_dump($collection->get('short_name')); // string(3) "曇"

$collection = Terminology::weatherByShortName('曇');
var_dump($collection->get('id')); // int(2)
var_dump($collection->get('name')); // string(6) "曇り"
var_dump($collection->get('short_name')); // string(3) "曇"
```

## License
Terminology in the Boatrace Venture Project is open source software licensed under the [MIT license](LICENSE).
