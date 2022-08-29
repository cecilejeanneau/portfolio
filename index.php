<?php

    require "./autoload.php";
    
    $router = new Router();
    
    $request = "/".$_GET['path'];
    
    $router->searchRoute($routes, $request);
    
    // then don't forget the try catch !
?>