<?php

    class AuthenticationController extends AbstractController {
        
        public UserManager $userM;
        
        public function __construct() {
            $this->userM = new UserManager();
        }
        
        // method to display the login form
        public function index(): void {
            $this->render($page = "login");
        }
        
        // this method should be the action of the login form
        public function loginCheckOpti(array $post = null): void {
            // retrieve the form data from $_POST
            $this->checkForm();
        }
        
        public function checkForm(): void{
            if(!is_null($_POST) && isset($_POST["username"])) {
                $this->checkUsername();
            } else {
                $this->whereRedirect();
            }
        }
        
        private function checkUsername(): void {
            try {
                if($this->userM->getUserByUsername($_POST['username']) !== null) {
                    $user = $this->userM->getUserByUsername($_POST['username']);
                    $username = $user->getUsername();
                        
                    if($_POST['username'] === $username) {
                        $this->checkPassword();
                    } else {
                        $this->whereRedirect();
                    }
                } else {
                    $this->whereRedirect();
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
        
        protected function checkPassword(): void {
            session_start();
            try {
                if(isset($_POST["password"])) {
                    $user = $this->userM->getUserByUsername($_POST['username']);
                    $password = $user->getPassword();
                    
                    if(password_verify($_POST['password'], $password)) {
                        
                        $username = $_POST["username"];
                        
                        
                        
                        $_SESSION["username"] = $username;
                        $_SESSION["connect"] = true;
                        
                        $this->whereRedirect(true);
                    } else {
                        throw new Exception("This user doesn't exist");
                        $this->whereRedirect();
                    }
                } else {
                    throw new Exception("This user doesn't exist");
                    $this->whereRedirect();
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
        
        private function whereRedirect($admin = false): void {
            if($admin){
                // var_dump($_SESSION);
                //         die;
                // $this->render($page = "admin_index");
                header('Location: admin');
                                // //ADMIN redirection
                exit();
            } else {
                header("Location: login");
                    
                exit;
            }
        }
        
    }

?>