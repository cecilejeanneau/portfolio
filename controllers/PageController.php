<?php

    class PageController extends AbstractController {
        
        public MediaManager $mediaM;
        
        // Instantiation of Manager class to link with the db
        public function __construct() {
            $this->mediaM = new MediaManager();
        }
        
        public function getMedias(): array {
            $results = $this->mediaM->getAllMedias();
            
            return $results;
        }
        
        public function index(): void {
            $this->render($page = "homepage");
        }
        
    }

?>