<?php

namespace Babaly\LaravelPaytech\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Babaly\LaravelPaytech\LaravelPaytech
 */
class LaravelPaytech extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Babaly\LaravelPaytech\LaravelPaytech::class;
    }
}
