<?php
    spl_autoload_register('autoload');

    function autoload($classname) {
        $path = "includes/";
        $ex = "_classes.php";
        $full = $path . $classname . $ex;

        if(!file_exists($full))
            return false;

        require_once $full;
    }
?>