<? php

    class AdminController {
            
            public function index(): void {
                $page = "admin_index";
                require "./templates/layout.phtml";
            }
            
            public function show(string $slug): void {
                $page = "admin_show";
                require "./templates/layout.phtml";
            }
            
        }

?>