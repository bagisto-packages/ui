<?php

namespace BagistoPackages\Ui\Exceptions;

class ThemeNotFound extends \Exception
{
    /**
     * @param $themeName
     */
    public function __construct($themeName)
	{
		parent::__construct("Theme $themeName not Found", 1);
	}
}