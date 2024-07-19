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
