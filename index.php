<?php

    require "./autoload.php";
    
    $router = new Router();
    
    $request = "/".$_GET['path'];
    
    $router->searchRoute($routes, $request);
    
?>