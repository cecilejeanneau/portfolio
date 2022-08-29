<?php

    require "./autoload.php";
    
    $router = new Router();
    
    if(isset($_GET['path'])) {
        $request = "/".$_GET['path'];
        // var_dump($_GET['path']);
    } else {
        $request = "/";
    }
    
    $router->searchRoute($routes, $request);
    // var_dump($router->searchRoute($routes, $request));
    
    // then don't forget the try catch !
?>