<?php

require "./services/FileUploader.php";

    class MediaController extends AbstractController { 
        
        public MediaManager $mediaM;
        
        // Instantiation of Manager class to link with the db
        public function __construct() {
            $this->mediaM = new MediaManager();
        }
        
        // Manage render for the template of contact page
        public function uploader(): void {
            session_start();
            if(!empty($_SESSION)) {
                if(isset($_SESSION["connect"])) {
                    if($_SESSION["connect"] === true){
                    $this->render($page = "file-uploader");
                    // method for child class form AbstractController : need to extends
                    } 
                }    
            } else {
                header("Location: login");
                    
                exit;
            }
        }
        
        public function index(): void {
            session_start();
            if(!empty($_SESSION)) {
                if(isset($_SESSION["connect"])) {
                    if($_SESSION["connect"] === true){
                    $this->render($page = "manage_medias");
                    // method for child class form AbstractController : need to extends
                    } 
                }    
            } else {
                $this->render($page = "medias");
            }
        }
        
        public function getMedias(): array {
            $results = $this->mediaM->getAllMedias();
            
            return $results;
        }
        
        public function getMediaByName(): array {
            
            $results = $this->mediaM->getMediaByName();
            
            return $results;
        }
        
        public function ajaxRequest(): array {
            
            $post = file_get_contents("php://input");
            $answer = json_decode($post, true);
            
            $search = "%".$answer['mediaFind']."%";
            
            $ajaxSearch = MediaManager::getMediaByName();
        }
        
        public function handleUpload(): void {
            // WILL NEED TO CHECK MIME !!
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
                        print_r($uploaded1);
                    }
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
    }

?>