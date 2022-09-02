<?php

    require "./autoload.php";

try {
    $router = new Router();
    
        if(isset($_GET['path'])) {
            $request = "/".$_GET['path'];
            // var_dump($_GET['path']);
            
        } else {
            $request = "/";
        }
        
        
        $router->searchRoute($routes, $request);
        // var_dump($router->searchRoute($routes, $request));
        
} catch(Exception $e) {
     echo "Exception : ".$e->getMessage();
}
    
    
    // then don't forget the try catch !
?>