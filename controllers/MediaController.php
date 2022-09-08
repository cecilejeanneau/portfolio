<?php

require "./services/FileUploader.php";

    class MediaController extends AbstractController { 
        
        public MediaManager $mediaM;
        
        public function __construct() {
            $this->mediaM = new MediaManager();
        }
        
        public function uploader(): void {
            $this->render($page = "file-uploader");
        }
        
        public function handleUpload() {
            // if(isset($_POST["submit"]))
            try {
                if(isset($_POST["submit"])) {
                    if(isset($_FILES["fileToUpload"])) {
                        var_dump($_FILES["fileToUpload"]);
                        var_dump($_FILES["fileToUpload"]['type']);
                        var_dump($_FILES);
                        var_dump($_POST);
                        $uploader = new FileUploader();
                        
                        $media = $uploader->upload($_FILES["fileToUpload"]);
                        
                        echo "<pre>";
                        print_r($media);
                        echo "</pre>";
                        
                        $uploaded1 = $this->mediaM->createMedia($media);
                        // $uploaded2 = $this->mediaM->getMediaById(50);
                        // $uploaded3 = $this->mediaM->getMediaByName('george');
                        print_r($uploaded1);
                        // print_r($uploaded2);
                        // print_r($uploaded3);
                        // $size = $uploader->checkFileSize($_FILES["size"]);
                        // var_dump(checkFileSize($_FILES["size"]));
                    }
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
    }

?>