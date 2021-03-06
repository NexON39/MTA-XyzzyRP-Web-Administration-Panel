<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    spl_autoload_register('autoload');

    function autoload($classname) {
        $paths = array(
            'includes/',
            '../includes/'
        );
        $ex = '_class.php';

        foreach($paths as $path) {
            $full = $path.$classname.$ex;
            if(file_exists($full)) {
                require_once $full;
                return;
            }
        }
    }
?>