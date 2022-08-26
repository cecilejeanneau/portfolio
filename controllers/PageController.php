<?php

    class PageController {
        
        public function index(): void {
            $page = "page";
            require "./templates/layout.phtml";
        }
        
    }

?>