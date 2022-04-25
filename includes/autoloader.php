<?php
    spl_autoload_register('myAutoLoader');

    //the autoload magic method facilitates automatic connection(s) with .php files
    function myAutoLoader($className) {
        $path = "classes/";
        $extension = ".php";
        $fullPath = $path . $className . $extension;

        if (!file_exists($fullPath)) {
            return false;
        }

        include_once $fullPath;
    }
?>