<?php

// require_once "AbstractController.php";

    class AuthenticationController extends AbstractController {
        
        public UserManager $user;
        
        public function __construct(){
            $this->user = new UserManager();
        }
        
        public function index(): void {
            $this->render($page = "log-in");
            $this->connectUser($_POST);
            $this->user->getUserByUsername($_POST['username']);
            // method for child class form AbstractController : need to extends
        }
        
        // this method should be the action of the login form
        public function loginCheck(array $post)
        {
            // retrieve the form data from $_POST
            
            // check using a manager if the username exists in the database
            
                // if yes check if the password is correct
                
                    // if its correct, send him to the admin page
                    // if not, back to the login form with error message
                
            // if not return an error
            
        }
        
        public function show(): void {
            $this->render($page = "sign-up");
            // method for child class form AbstractController : need to extends
        }
        
        public function connectUser(array $post): void {
            // array because POST return a array
            
                if(!is_null($_POST["username"]) && isset($_POST["username"])) {
                    // if username is not null and set
                    
                            var_dump($_POST['username']);
                            
                    if(!is_null($_POST["password"]) && isset($_POST["password"]    )) {
                        // if password is not null and set
                        if(!is_null($_POST["email"]) && isset($_POST["email"]))     {
                            // if email is not null and set
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $email = $_POST["email"];
                            
                            // $user->getUserByUsername($_POST['username']);
                            
                            if($username === $result['username'] && $password === $result['password'] ) {
                                
                                echo "welcome".$username." "."you're connected !";
                                $routeFound = true;
                                $request = "/admin";
                            } else {
                                echo "not a user";
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