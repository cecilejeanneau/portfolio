<?php

    class LogOutController extends AuthenticationController {
        
        public function logOut() {
            
            session_start();
            
            if(isset($_SESSION)) {
                
                unset($_SESSION["user"]);
                session_destroy();
                
                header('Location: home');
                    // redirect to home
                exit();
                
            }
        }
        
    }

?>