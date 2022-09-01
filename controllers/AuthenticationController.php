<?php

    class AuthenticationController extends AbstractController {
        
        public UserManager $user;
        
        public function __construct(){
            $this->user = new UserManager();
        }
        
        public function index(): void {
            $this->render($page = "login");
            // $this->connectUser($_POST);
            
            // method for child class form AbstractController : need to extends
        }
        
        // this method should be the action of the login form
        public function loginCheck(array $post = null): void {
            // retrieve the form data from $_POST
            if(!is_null($post) && isset($post["username"])) {
            // check using a manager if the username exists in the database
                $this->user->getUserByUsername($_POST['username']);
                if($_POST['username'] === $result['username']) {
                    // if yes check if the password is correct
                    if($_POST['password'] === $result['password']) {
                        // if its correct, send him to the admin page
                        echo "welcome".$username." "."you're connected !";
                    } else {
                        // if not, back to the login form with error message
                        echo "not a user, please login !";
                    }
                    
                } else {
                    // if not return an error
                    echo "not a user, please login !";
                }
            } else {
                // if not return an error
                
                echo "please login !";
                header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/login");
                exit;
                
                
            }
            
        }
        
        public function show(): void {
            $this->render($page = "sign-up");
            // method for child class form AbstractController : need to extends
        }
        
        // public function connectUser(array $post): void {
        //     // array because POST return a array
            
        //         if(!is_null($_POST["username"]) && isset($_POST["username"])) {
        //             // if username is not null and set
                    
        //                     var_dump($_POST['username']);
                            
        //             if(!is_null($_POST["password"]) && isset($_POST["password"]    )) {
        //                 // if password is not null and set
        //                 if(!is_null($_POST["email"]) && isset($_POST["email"]))     {
        //                     // if email is not null and set
        //                     $username = $_POST["username"];
        //                     $password = $_POST["password"];
        //                     $email = $_POST["email"];
                            
        //                     // $user->getUserByUsername($_POST['username']);
                            
        //                     if($username === $result['username'] && $password === $result['password'] ) {
                                
        //                         echo "welcome".$username." "."you're connected !";
        //                         $routeFound = true;
        //                         $request = "/admin";
        //                     } else {
        //                         echo "not a user";
        //                     }
        //                 }
        //             }
        //         }
            
        //     else
        //     {
        //         echo "404 error !";   
        //     }
        // }
        
    }

?>