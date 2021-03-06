<?php

include __DIR__ . '/../autoload_register.php';

/*if (file_exists($file = __DIR__ . '/../vendor/autoload.php')) {
    include $file;
}

spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'SpecRepo\\';

    // base directory for the namespace prefix (tests directory)
    $base_dir = __DIR__ . DIRECTORY_SEPARATOR;

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
	
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

/*spl_autoload_register(function($class) {
    $file = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $class) . '.php';
    if (false === ($realpath = stream_resolve_include_path($file))) {
        return false;
    }
    include_once $realpath;
});*/