<?php

    // require "AbstractController.php";

    class PageController extends AbstractController {
        
        public function index(): void {
            $this->render($page = "homepage");
        }
        
    }

?>