<?php

    class AuthenticationController extends AbstractController {
        
        public UserManager $userM;
        
        public function __construct() {
            $this->userM = new UserManager();
        }
        
        public function index(): void {
            $this->render($page = "login");
        }
        
        // this method should be the action of the login form
        public function loginCheckOpti(array $post = null): void {
            // retrieve the form data from $_POST
            $this->checkForm();
        }
        
        private function checkForm(): void{
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
        
        private function checkPassword(): void {
            try {
                if(isset($_POST["password"])) {
                    $user = $this->userM->getUserByUsername($_POST['username']);
                    $password = $user->getPassword();
                    
                    if($_POST['password'] === $password) {
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