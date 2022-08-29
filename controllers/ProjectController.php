<?php

    class ProjectController {
        
        public function index(): void {
            $this->render($page = "project_index");
        }
        
        public function show(string $slug): void {
            $this->render($page = "project_show");
        }
        
    }

?>