<?php
/**
 * @author : Gaellan
 * @contributor : JEANNEAU Cécile
 */
 
//  Then think to require here managers too
    require "./controllers/AbstractController.php";
    require "./services/Router.php";
    require "./controllers/PageController.php";
    require "./controllers/ProjectController.php";
    require "./controllers/AuthenticationController.php";
    require "./controllers/AdminController.php";
    require "./controllers/ContactController.php";
    
    $routes = [];
    
    // Read/Manage the routes config file
    $handle = fopen("config/routes.txt", "r");
    
    if($handle) {
        // if routes.txt exists
        while(($line = fgets($handle)) !== false) {
            // while there's a line read line by line routes.txt
            
            $route = [];
            // each route is an array

            $routeData = explode(" ", str_replace(PHP_EOL, '', $line)); 
            // divide the line in two strings (cut at the " ")
    
            $route["path"] = $routeData[0]; 
            // the path is what was before the " "
    
            if(substr_count($route["path"], "/") > 1) {
            // check if the path string has more than 1 "/" : like /projets/*
            
                $route["parameter"] = true; 
                // define that the route expects a parameter
                
                $pathData = explode("/", $route["path"]); 
                // divide the path in three strings (cut at the "/") : ""."projets"."*"
                
                $route["path"] = "/".$pathData[1]; 
                // isolate the path without the parameters
                
            } else {
                $route["parameter"] = false; 
                // the route doesn't expect a parameter
            }
    
            $controllerString = $routeData[1]; 
            // the controller string is what was after the " " in the first array of the first explode;
    
            $controllerData = explode(":", $controllerString); 
            // divide the controller string in two strings (cut at the ":")
    
            $route["controller"] = $controllerData[0]; 
            // the controller is what was before the ":"
    
            $route["method"] = $controllerData[1]; 
            // the method is what was after the ":"
    
            $routes[] = $route; 
            // add the new route array to the routes array
        }
    
        fclose($handle); 
        // don't forget to close the file !!
        }
    
?>