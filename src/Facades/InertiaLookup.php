<?php

namespace SoftPulze\InertiaLookup\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SoftPulze\InertiaLookup\InertiaLookup
 */
class InertiaLookup extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SoftPulze\InertiaLookup\InertiaLookup::class;
    }
}
