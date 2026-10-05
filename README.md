# PHP Config

A small wrapper for reading values from a configuration array using dot notation.

## Requirements

- PHP 8.3 or newer, including PHP 8.5
- Composer

## Installation

```bash
composer require websk/php-config
```

## Usage

```php
<?php

use WebSK\Config\ConfWrapper;

ConfWrapper::setConfig([
    'settings' => [
        'displayErrorDetails' => false,
        'database' => [
            'host' => 'localhost',
        ],
    ],
]);

$host = ConfWrapper::value('settings.database.host');
$port = ConfWrapper::value('settings.database.port', 3306);
```

`value()` returns the supplied default when a key does not exist or when an
intermediate value cannot be traversed. Existing `null` values are returned as
`null` and are not replaced with the default. An empty path returns an empty
string.

Calling `setConfig()` replaces the complete previously stored configuration.

## Testing

Install development dependencies and run the test suite:

```bash
composer install
composer test
```
