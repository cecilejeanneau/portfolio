<?php

    class LogOutController extends AuthenticationController {
        
        public function logOut() {
            
            session_start();
            
            if(isset($_SESSION)) {
                unset($_SESSION["user"]);
                session_destroy();
                // redirect to home
                header('Location: home');
                exit();
            }
        }
        
    }

?>