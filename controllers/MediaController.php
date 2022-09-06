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
                    
                    $uploaded = $this->mediaM->createMedia($media);
                    print_r($uploaded);
                    // $size = $uploader->checkFileSize($_FILES["size"]);
                    // var_dump(checkFileSize($_FILES["size"]));
                }
            }
        }
    }

?>