<?php

require "./entities/FileUploader.php";

    class FileUploaderController extends AbstractController { 
        
        public MediaManager $mediaM;
        
        public function __construct(){
            $this->mediaM = new MediaManager();
        }
        
    }

?>