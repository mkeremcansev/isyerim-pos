<?php

namespace Mkeremcansev\IsyerimPos\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mkeremcansev\IsyerimPos\IsyerimPos
 */
class IsyerimPos extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mkeremcansev\IsyerimPos\IsyerimPos::class;
    }
}
