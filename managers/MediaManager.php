<?php

require_once "./managers/AbstractManager.php";

    class MediaManager extends AbstractManager {
        
        private function dbConnect(){
            $this->__construct();
        }
        
        // CRUD : CREATE READ UPDATE DELETE
        public function createMedia(Media $media): Media {
            // CREATE
            $query = $this->db->prepare('INSERT INTO medias(name, description, alt, filename, category, file_type) VALUES (:name, :description, :alt, :filename, :category, :file_type)');
            // prepare() method from PDO enable to protect from MYSQL injections
            
            $parameters = [
                'name' => $media->getName(),
                'description' => $media->getDescription(),
                'alt' => $media->getAlt(),
                'filename' => $media->getFileName(),
                'category' => $media->getCategory(),
                'file_type' => $media->getFileType()
            ];
            $query->execute($parameters);
            $id = $this->db->lastInsertId();
            
            $media->setId($id);
            return $media;
            
        }
        
        public function getMediaByName(string $name): ?Media {
            // READ
            $query = $this->db->prepare('SELECT name, description, alt, filename, category, file_type FROM medias WHERE medias.name = :name');
            $parameters = [
                'name' => $name
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            if(!is_null($result))
            {
                return new Media($result['id'], $result['name'], $result['description'], $result['alt'], $result['filename'], $result['category'], $result['file_type']);
            }
            
            echo "This media doesn't exist";
            
        }
        
        public function updateMedia(Media $media): Media {
            // UPDATE
            $query = $this->db->prepare('UPDATE medias SET name = :name, description = :description, alt = :alt, filename = :filename, category = :category, file_type = :file_type WHERE id = :id ');
            $parameters = [
                'id' => $media->getId(),
                'name' => $media->getName(),
                'description' => $media->getDescription(),
                'alt' => $media->getAlt(),
                'filename' => $media->getFileName(),
                'category' => $media->getCategory(),
                'file_type' => $media->getFileType()
            ];
            $query->execute($parameters);
                
            return $media;
            
        }
        
        public function deleteMedia(Media $media): Media {
            // DELETE
            $query = $this->db->prepare('DELETE FROM medias WHERE name = :name ');
            $query->execute();
                
            echo "This media has been successfully removed";
            
        }
        
    }

?>