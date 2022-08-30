<?php

require_once "./managers/UserManager.php";


    class AuthenticationController extends AbstractController {
        
        private UserManager $user;
        
        public function index(): void {
            $this->render($page = "log-in");
            // method for child class form AbstractController : need to extends
        }
        
        public function show(): void {
            $this->render($page = "sign-up");
            // method for child class form AbstractController : need to extends
        }
        
        public function connectUser(array $post = null): void {
            // array because that's JSON return from POST
            
                if(!is_null($_POST["username"]) && isset($_POST["username"])) {
                    // if username is not null and set
                    if(!is_null($_POST["password"]) && isset($_POST["password"]    )) {
                        // if password is not null and set
                        if(!is_null($_POST["email"]) && isset($_POST["email"]))     {
                            // if email is not null and set
                            $username = $post["username"];
                            $password = $post["password"];
                            $email = $post["email"];
                            
                            if($username === $result['username'] && $password === $result['password'] ) {
                                
                                echo "welcome".$username.""."you're connected !";
                                $routeFound = true;
                                $request = "/admin";
                            }
                        }
                    }
                }
            
            else
            {
                echo "404 error !";   
            }
        }
        
    }

?>