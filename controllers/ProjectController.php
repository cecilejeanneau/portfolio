<? php

    class PageController {
        
        public function index(): void {
            $page = "project_index";
            require "./templates/layout.phtml";
        }
        
        public function show(string $slug): void {
            $page = "project_show";
            require "./templates/layout.phtml";
        }
        
    }

?>