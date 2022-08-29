<?php

require_once "./managers/UserManager.php";

    class AuthenticationController extends AbstractController {
        
        private UserManager $user;
        
        public function __construct() {
            $this->user = new UserManager();
        }
        
        public function connectUser(array $post = null): void {
            // array because that's JSON return from POST
            if(!is_null($post) && isset($post["form"]) {
                // if it's not null and submit
                $username = $post["username"];
                $password = $post["password"];
                
                if($username === $result['username'] && $password === $result['password'] ) {
                    
                    echo "welcome".$username.""."you're connected !";
                    $routeFound = true;
                    $request = "/";
                }
                
            }
            else
            {
                echo "404 error !";   
            }
        }
        
    }

?>