# Laravel Bundles

Laravel Bundles is a development package that aims to make creating files using artisan commands easier.
It achieves this by defining preset 'bundles' in a bundles config file.

# Publish Config
To publish the bundles config file run:
```bash
php artisan vendor:publish --tag=bundles-config
```

This will create a config file that looks like this:
```php
<?php

use ConnorLock05\LaravelBundles\Data\Makeables;

return [

    /*
    |--------------------------------------------------------------------------
    | Bundles
    |--------------------------------------------------------------------------
    |
    | This value is where you can define your bundles.
    | Add an array key with an associated array of files to make
    |
    | Example: Creates a Model, Controller and Create Migration
    |
    */
    'bundles' => [
        'example' => [
            Makeables::Model,
            Makeables::Controller,
            Makeables::Migration,
        ],
    ],

];
```

The bundles array is where you can define your bundles. The array key is the name, and the value is an array of `Makeables`.

# Example Definition
An example definition for a bundle would be:
```php
use ConnorLock05\LaravelBundles\Data\Makeables;

'CRUD Item' => [
    Makeables::Model,
    Makeables::ResourceController,
    Makeables::Migration,
    Makeables::Policy,
],
```

Turing the config file into:
```php
<?php

use ConnorLock05\LaravelBundles\Data\Makeables;

return [

    /*
    |--------------------------------------------------------------------------
    | Bundles
    |--------------------------------------------------------------------------
    |
    | This value is where you can define your bundles.
    | Add an array key with an associated array of files to make
    |
    | Example: Creates a Model, Controller and Create Migration
    |
    */
    'bundles' => [
        'example' => [
            Makeables::Model,
            Makeables::Controller,
            Makeables::Migration,
        ],
        'CRUD Item' => [
            Makeables::Model,
            Makeables::ResourceController,
            Makeables::Migration,
            Makeables::Policy,
],
    ],

];
```
This bundle will create a Model, Controller (with the --resource option), migration and a policy

# Making a Bundle

To make a defined bundle, simply run:
```bash
php artisan make:bundle
```

This will then present you with a list of defined bundles. Move to the one you want with the arrow keys and select with enter.
Each `Makeable` will then be triggered and prompt the user to enter details about the `Makeable`.


