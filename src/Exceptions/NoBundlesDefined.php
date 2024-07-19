<?php

namespace ConnorLock05\LaravelBundles\Exceptions;

use Exception;
use Throwable;

class NoBundlesDefined extends Exception
{
    public function __construct(string $message = "No Bundles Defined", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
