<?php

namespace BagistoPackages\Ui\Facades;

use Illuminate\Support\Facades\Facade;

class Themes extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'themes';
    }
}