<?php

    require "./autoload.php";
    
    try {
        $router = new Router();
        
        if(isset($_GET['path'])) {
            $request = "/".$_GET['path'];
        } else {
            $request = "/";
        }
        
        $router->searchRoute($routes, $request);
            
    } catch(Exception $e) {
         echo "Exception : ".$e->getMessage();
    }

?>