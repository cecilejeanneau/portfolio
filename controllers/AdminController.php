<?php

    // require "AbstractController.php";

    class AdminController extends AbstractController {
            
        
        
        public function index(): void {
            $this->render($page = "admin_index");
        }
        
        public function show(): void {
            $this->render($page = "admin_show");
        }
            
    }

?>