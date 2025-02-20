<?php

spl_autoload_register(function ($className) 
{
        $classFile = '../'.str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($classFile)) 
        {
            require_once $classFile;
        }
});
