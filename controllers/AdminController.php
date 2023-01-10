<?php

    class AdminController extends AuthenticationController {
            
        
        public function index(): void {
            
            session_start();
            
            if(!empty($_SESSION)) {
                
                if(isset($_SESSION["connect"])) {
                    
                    if($_SESSION["connect"] === true){
                    $this->render($page = "admin_index");
                    // method for child class form AbstractController : need to extends
                    }
                    
                }
                
            } else {
                header("Location: login");
                exit;
            }
            
        }
        
        public function show(): void {
            $this->render($page = "admin_show");
        }
            
    }

?>