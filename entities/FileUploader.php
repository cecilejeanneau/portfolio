<?php

/**
 * File Uploader class used for media upload
 * @author Mari Doucet
 * @author JEANNEAU Cécile
*/

require "Media.php";

    class FileUploader
    {
        private string $uploadFile = "/uploads/";
        private array $allowedFileTypes = ["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"];
        private int $maxFileSize = 2000000; // 2 Mo
        
        private function generateFileName(): string {
            $randomString = bin2hex(random_bytes(10)); // random string, 20 characters a-z 0-9
            
            return $randomString;
        }
        
        private function checkFileSize(int $fileSize) {
            // check if file is not too big
            if($_FILES["size"]>$maxFileSize) {
                echo "the file need to be less than 2Mo ";
                header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/file-uploader");
                
                exit;
            } else {
                // call createMedia function from FileUploader
            }
        }
        
        private function checkFileType(string $fileType): bool {
            // vérifier que le type est bien l'un des types autorisés
            if($_FILES["type"] === "image/*") {
                // call createMedia function from FileUploader
            } else {
                echo "the file need to be image type";
                header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/file-uploader");
                
                exit;
            }
        }
        
        public function upload(array $file): Media {
            // appeler $this->checkFileType(string $fileType) pour vérifier le type du fichier 
            $this->checkFileType($file["type"]);
            // appeler $this->checkFileSize(int $fileSize) pour vérifier le type du fichier
            $this->checkFileSize($file["size"]);
            
            $id = null;
            $name = $file["name"];
            $description = $_POST["description"];
            $alt = $_POST["alt"];
            $fileName = $this->generateFileName();
            $category = $_POST["category"];
            $fileType = pathinfo($name)["extension"];
            $url = getcwd() . $this->uploadFile . $fileName . ".". $fileType;
            
            move_uploaded_file($file["tmp_name"], $url);
            
            return new Media($id, $name, $description, $alt, $fileName, $category, $fileType, $url);
        }
    }                                
                            
?>