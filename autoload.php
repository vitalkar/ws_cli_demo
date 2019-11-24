<?php
spl_autoload_register(function($class){
    $path = "./models/$class.php";
    if (file_exists($path)) 
    {
        require_once $path;
    }
});