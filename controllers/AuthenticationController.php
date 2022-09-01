<?php

    class AuthenticationController extends AbstractController {
        
        public UserManager $userm;
        
        public function __construct(){
            $this->userm = new UserManager();
        }
        
        public function index(): void {
            $this->render($page = "login");
            // $this->connectUser($_POST);
            
            // method for child class form AbstractController : need to extends
        }
        
        // this method should be the action of the login form
        public function loginCheck(array $post = null): void {
            // retrieve the form data from $_POST
            if(!is_null($_POST) && isset($_POST["username"])) {
            // check using a manager if the username exists in the database
                if($this->userm->getUserByUsername($_POST['username']) !== null){
                    $user = $this->userm->getUserByUsername($_POST['username']);
                    
                    $username = $user->getUsername();
                    $password = $user->getPassword();
                    // $username = $this->user->username;
                    if($_POST['username'] === $username) {
                        // if yes check if the password is correct
                        if(isset($_POST["password"])) {
                            if($_POST['password'] === $password) {
                                // if its correct, send him to the admin page
                                
                                // session_start();
                                // //Session START
                                // $_SESSION['id'] = $result['id'];
                                // $_SESSION['username'] = $result['username'];
                                // $_SESSION['email'] = $result['email'];
                             
                                header('Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/admin');
                                // //ADMIN redirection
                                exit();
                                
                                var_dump($_POST['username']);
                                echo "welcome".$username." "."you're connected !";
                            } else {
                                // if not, back to the login form with error message
                                var_dump($_POST['username']);
                                // echo "not a user, please login !";
                                header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/login");
                        
                                exit;
                            }
                        }
                    } else {
                        // if not return an error
                        
                    var_dump($_POST['username']);
                        echo "not a user, please login !";
                    }
                }
            } else {
                // if not return an error
                var_dump($_POST['username']);
                header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/login");
                
                exit;
            }
            
        }
        private function checkForm(){
            if(!is_null($_POST) && isset($_POST["username"])) {
                $this->checkUsername();
            } else {
                $this->whereRedirect();
            }
        }
        
        private function checkUsername() {
            if($this->userm->getUserByUsername($_POST['username']) !== null) {
                $user = $this->userm->getUserByUsername($_POST['username']);
                    
                    $username = $user->getUsername();
                    $password = $user->getPassword();
                    // $username = $this->user->username;
                    if($_POST['username'] === $username) {
                        $this->checkPassword();
                    } else {
                        $this->whereRedirect();
                    }
            } else {
                $this->whereRedirect();
            }
        }
        
        private function checkPassword() {
            if(isset($_POST["password"])) {
                if($_POST['password'] === $password) {
                    $this->whereRedirect(true);
                }
            } else {
                $this->whereRedirect();
            }
        }
        
        private function whereRedirect($admin = false) {
            if($admin){
                header('Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/admin');
                                // //ADMIN redirection
                exit();
            } else {
            header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/login");
                
            exit;
            }
        }
        
        public function show(): void {
            $this->render($page = "sign-up");
            // method for child class form AbstractController : need to extends
        }
        
    }

?>