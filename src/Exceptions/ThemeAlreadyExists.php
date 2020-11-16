<?php

namespace BagistoPackages\Ui\Exceptions;

class ThemeAlreadyExists extends \Exception
{
    /**
     * @param \BagistoPackages\Ui\Theme $theme
     * @return void
     */
    public function __construct($theme)
    {
        parent::__construct("Theme {$theme->name} already exists", 1);
    }
}