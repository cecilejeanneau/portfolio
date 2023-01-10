<?php

    class UserController extends AbstractController {
        
        public UserManager $userM;
        
        public function __construct() {
            $this->userM = new UserManager();
        }
        
        public function index(): void {
            $this->render($page = "inscription");
                // method for child class form AbstractController : need to extends
        }
        
        // this method should be the action of the login form
        public function signCheck(array $post = null): void {
            // retrieve the form data from $_POST
            $this->checkForm();
        }
        
        public function deleteUser(): void {
            // retrieve the form data from $_POST
            $this->userM->deleteUser();
        }
        
        private function checkForm(): void{
            
            if(!is_null($_POST) && isset($_POST["username"])) {
                
                if(isset($_POST["email"])) {
                    
                    if(isset($_POST["password"])) {
                        
                        $id= null;
                        $username = trim($_POST["username"]);
                        $email = trim($_POST["email"]);
                        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
                        
                        $user = new User($id, $username, $password, $email);
                        
                        $createUser = $this->userM->createUser($user);
                        
                        $this->whereRedirect(true);
                    
                    } else {
                        $this->whereRedirect();
                    }
                    
                } else {
                    $this->whereRedirect();
                }
                
            } else {
                $this->whereRedirect();
            }
            
        }
        
        private function whereRedirect($admin = false) {
            
            if($admin){
                header('Location: admin');
                    // //ADMIN redirection
                exit();
            } else {
                header("Location: inscription");
                
                exit;
            }
            
        }
    }

?>