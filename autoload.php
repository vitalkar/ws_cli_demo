<?php
spl_autoload_register(function ($class) {
    $path = "models/$class.class.php";
    if (file_exists($path)) {
        require_once $path;
    }
    // require_once 'models/' . $class . '.class.php';
});
