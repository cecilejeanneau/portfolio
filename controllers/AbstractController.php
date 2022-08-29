<?php
    

    abstract class AbstractController {
        
        protected function render(string $page): void {
            require "./templates/layout.phtml";
        }
        
    }

?>