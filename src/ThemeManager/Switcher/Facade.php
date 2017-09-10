<?php

namespace ThemeManager\Switcher;

class Facade extends \Illuminate\Support\Facades\Facade {

    protected static function getFacadeAccessor() {
    	return 'theme-manager.switcher';
    }
}