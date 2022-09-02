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
        
        private function generateFileName() : string
        {
            $randomString = bin2hex(random_bytes(10)); // random string, 20 characters a-z 0-9
            
            return $randomString;
        }
        
        private function checkFileSize(int $fileSize)
        {
            // vérifier que le fichier n'est pas trop gros
        }
        
        private function checkFileType(string $fileType) : bool
        {
            // vérifier que le type est bien l'un des types autorisés
        }
        
        public function upload(array $file) : Media
        {
            // appeler $this->checkFileType(string $fileType) pour vérifier le type du fichier 
            // appeler $this->checkFileSize(int $fileSize) pour vérifier le type du fichier 
            $originalName = $file["name"];
            $fileName = $this->generateFileName();
            $fileType = pathinfo($originalName)["extension"];
            $url = getcwd() . $this->uploadFile . $fileName . ".". $fileType;
            
            move_uploaded_file($file["tmp_name"], $url);
            
            return new Media($originalName, $fileName, $fileType, $url);
        }
    }                                
                            
?>