<?php

declare(strict_types=1);

namespace SoftPulze\InertiaLookup\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SoftPulze\InertiaLookup\InertiaLookup
 */
final class InertiaLookup extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SoftPulze\InertiaLookup\InertiaLookup::class;
    }
}
