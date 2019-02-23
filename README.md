# Pile

[![Version](https://img.shields.io/packagist/v/neubert/pile.svg?label=version)](https://packagist.org/packages/neubert/pile)
[![Build Status](https://travis-ci.com/danielneubert/pile.svg?branch=master)](https://travis-ci.com/danielneubert/pile)

## A small helper for fetching multidimensional arrays and objects.

Pile for PHP can return a value of a multidimensional array or object (or mixed). When the searched value can not be found *(due to not existing keys for example)* Pile will return `null`.

## Installation

### Composer

The preffered way getting Pile is requireing it via composer:

```sh
composer require neubert/pile
```

### Download

If you'd like to download Pile to your project you can click here:

[**Download Pile v2.0.0** (latest)](https://raw.githubusercontent.com/danielneubert/pile/master/src/Neubert/Pile/Pile.php)

## Example

```php
<?php

// sample array
$foo = (object) [
    'key-1' => [
        'key-2' => [
            'key-3' => 'bar'
        ]
    ]
];

// echos 'bar'
echo Pile::find($foo, 'key-1', 'key-2', 'key-3');
```

## License

Pile is released under the MIT License. See the bundled [LICENSE](LICENSE) file for details.