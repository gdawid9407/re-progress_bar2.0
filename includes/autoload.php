<?php
// Prevent direct access
defined('ABSPATH') || exit;

// Fallback PSR-4 autoloader: maps ReProgressBar\ namespace to modules/ directory
spl_autoload_register(function ($class) {
    $prefix = 'ReProgressBar\\';
    $base_dir = __DIR__ . '/../modules/';
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});
