<?php

/**
 * File Uploader class used for media upload
 * @author Mari Doucet
 * @author JEANNEAU Cécile
*/

require "./entities/Media.php";
require "./entities/Contact.php";

    class FileUploader extends AbstractController {
        
        private string $uploadFile = "/uploads/";
        private array $allowedFileTypes = ["image/png", "image/PNG", "image/jpg", "image/JPG", "image/jpeg", "image/JPEG"];
        private int $maxFileSize = 2097152; // 2 Mo
        
        private function generateFileName(): string {
            $randomString = bin2hex(random_bytes(10)); // random string, 20 characters a-z 0-9
            
            return $randomString;
        }
        
        private function checkFileSize(int $fileSize) {
            // check if file is not too big
            if($_FILES["fileToUpload"]['size']>$this->maxFileSize) {
                // echo "the file need to be less than 2Mo ";
                header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/file-uploader");
                
                exit;
            } else {
                echo "ur picture is not too big";
            }
        }
        
        private function checkFileType(string $fileType): bool {
            // check if type is one of those authorized
            
                
                if (in_array($_FILES["fileToUpload"]['type'], $this->allowedFileTypes)) {
                    echo "Got ".$_FILES["fileToUpload"]['type']." this is a picture"."<br>";
                    return true;
                    // }
                } else {
                    
                    header("Location: https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/file-uploader");
                    echo "the file need to be image type";
                    exit;
                    return false;
                }
            
        }
        
        public function upload(array $file): Media {
            
            $this->checkFileType($file["type"]);
            $this->checkFileSize($file["size"]);
            
            $id = null;
            $name = $_POST["name"];
            $description = $_POST["description"];
            $alt = $_POST["alt"];
            $fileName = $this->generateFileName();
            $category = $_POST["category"];
            $fileType = pathinfo($file['name'])["extension"];
            $url = getcwd() . $this->uploadFile . $fileName . ".". $fileType;
            
            move_uploaded_file($file["tmp_name"], $url);
            
            return new Media($id, $name, $description, $alt, $fileName, $category, $fileType, $url);
        }
    }                                
                            
?>