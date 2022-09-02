<?php

require "./entities/FileUploader.php";

    class FileUploaderController extends AbstractController {   
        
        public function index(): void {
            $this->render($page = "file-uploader");
        }
        
        public function handleUpload() {
            if(isset($_POST["submit"])) {
                if(isset($_FILES["fileToUpload"]))
                {
                    $uploader = new FileUploader();
                    
                    $media = $uploader->upload($_FILES["fileToUpload"]);
                    
                    echo "<pre>";
                    print_r($media);
                    echo "</pre>";
                }
            }
        }
        
    }

?>