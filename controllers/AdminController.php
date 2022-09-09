<?php

    // require "AbstractController.php";

    class AdminController extends AbstractController {
            
        
        public function index(): void {
            $this->render($page = "admin_index");
            // method for child class form AbstractController : need to extends
        }
        
        public function show(): void {
            $this->render($page = "admin_show");
        }
            
    }

?>