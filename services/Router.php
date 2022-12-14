<?php
/**
 * @author : Gaellan
 * @author : JEANNEAU Cécile
 */
 
    class Router {
        
        private function requestSplit(string $request) {
            
            $route = [];
            $routeSplit = explode("/", $request); 
            // spell/parse $route founded inside routes.txt in an array through / symbol through autoload.php
            $route["path"] = "/".$routeSplit[1];
            
            if(count($routeSplit)>2) {
                $route["parameter"] = $routeSplit[2];
            }
            else {
                $route["parameter"] = null;
            }
            
            return $route;
        }
        
        public function searchRoute(array $routes, string $request) {
            
            $requestResult = $this->requestSplit($request);
            // requestSplit is private so $this = class Router and permit to call the method even if it's private, but only inside the same class. $requestResult stock the return of it
            $routeFound = false;
            // flag
            
            foreach($routes as $route) {
                // for each $routes of the list $route from autoload.php
                
                $controller = $route["controller"];
                // ex : $controller = PageController.php
                $method = $route["method"];
                $parameter = $route["parameter"];
                
                if($route["path"] === $requestResult["path"]) {
                // if path from the request is declare in routes.txt and dealed by autoload
                
                    if($route["parameter"] && $requestResult["parameter"] !== null) {
                        // if parameter is need and send in request
                        
                        $routeFound = true;
                        // flag change to true because the request route is found
                        $ctrl = new $controller();
                        // ex : $ctrl = new Page();
                        $ctrl->$method($requestResult["parameter"]);
                        //  ex : $ctrl call a method from Page controller for the instance new Page()
                    } else if(!$route["parameter"] && $requestResult["parameter"] === null) {
                        // no parameter needed and none in the request either
                        
                        $routeFound = true;
                        
                        $ctrl = new $controller();
                        $ctrl->$method();
                        // la magie noire
                    }
                }
            }
            
            if(!$routeFound) {
                // the route from the request doesn't exist so error management, put an exception with 404 (security)
                throw new Exception("Route not found", 404);
            }
        }
    }

// 	Router->searchRoute( $routes = [0 => ['path' => '/', 'parameter' => FALSE, 'controller' => 'PageController', 'method' => 'index'], 1 => ['path' => '/projets', 'parameter' => FALSE, 'controller' => 'ProjectController', 'method' => 'index'], 2 => ['path' => '/projets', 'parameter' => TRUE, 'controller' => 'ProjectController', 'method' => 'show'], 3 => ['path' => '/a-propos', 'parameter' => FALSE, 'controller' => 'AboutController', 'method' => 'index'], 4 => ['path' => '/contact', 'parameter' => FALSE, 'controller' => 'ContactController', 'method' => 'index'], 5 => ['path' => '/login', 'parameter' => FALSE, 'controller' => 'AuthenticationController', 'method' => 'index'], 6 => ['path' => '/login-check', 'parameter' => FALSE, 'controller' => 'AuthenticationController', 'method' => 'loginCheck'], 7 => ['path' => '/sign-up', 'parameter' => FALSE, 'controller' => 'AuthenticationController', 'method' => 'show'], 8 => ['path' => '/admin', 'parameter' => FALSE, 'controller' => 'AdminController', 'method' => 'index'], 9 => ['path' => '/admin', 'parameter' => TRUE, 'controller' => 'AdminController', 'method' => 'show']], $request = '/login-check' )

?>