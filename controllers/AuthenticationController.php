<? php

    class AuthenticationController
    {
        public function signUp(array $post = null): void {
            if($post !== null && isset($post["form_name"]) && $post["form_name"] === "sign_up_form")
            {
                $username = $post["username"];
                $password = $post["password"];
                
                $user = new User($username, $password, $email);
                $userManager = new UserManager();
                $u = $userManager->createUser($user);
            }
            else
            {
                $page = "sign-up";
                $action = "index.php?route=admin";
                $formName = "sign_up_form";
                require "./templates/layout.phtml";   
            }
        }
        
        public function logIn(array $post = null): void {
            if($post !== null && isset($post["form_name"]) && $post["form_name"] === "log_in_form")
            {
                $username = $post["username"];
                $password = $post["password"];
                
                // load a Player and its last saved Game
            }
            else
            {
                $page = "log-in";
                $action = "index.php?route=admin/*";
                $formName = "log_in_form";
                require "./templates/layout.phtml";
            }
        }
    }

?>