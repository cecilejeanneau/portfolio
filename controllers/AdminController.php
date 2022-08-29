<?php

    require "AbstractController.php";

    class AdminController extends AbstractController {
            
            // public string $page = "admin_index";
        // protected function render() {
            
        // }
            
        public function render() {
            // $this->page = $page;
            $page = "admin_index";
        }
        
        
        // public function index() {
        //     $page = "admin_index";
        //     require "./templates/layout.phtml";
        // }
        
        public function show() {
            $page = "admin_show";
            // require "./templates/layout.phtml";
        }
            
    }

?>