<?php

class Autoloader
{

    public function register()
    {
        spl_autoload_register(array($this, 'load'));
    }

    public function load($class)
    {
        $file=str_replace('\\', '/', $class);
        if (file_exists('../Lib/' . $file . '.php')) {
            require '../Lib/' . $file . '.php';
        }
    }
}