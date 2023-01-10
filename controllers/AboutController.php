<?php

    class AboutController extends AbstractController {
        
        public function index(): void {
            $this->render($page = "a-propos");
        }
        
    }

?>