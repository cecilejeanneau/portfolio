<?php

// require_once "./managers/AbstractManager.php";

    class MediaManager extends AbstractManager {
        
        // CRUD : CREATE READ UPDATE DELETE
        public function createMedia(Media $media): Media {
            // CREATE
            $query = $this->db->prepare('INSERT INTO medias(name, description, alt, fileName, category, fileType, url) VALUES (:name, :description, :alt, :fileName, :category, :fileType, :url)');
            // prepare() method from PDO enable to protect from MYSQL injections
            
            $parameters = [
                'name' => $media->getName(),
                'description' => $media->getDescription(),
                'alt' => $media->getAlt(),
                'fileName' => $media->getFileName(),
                'category' => $media->getCategory(),
                'fileType' => $media->getFileType(),
                'url' => $media->getUrl()
            ];
            $query->execute($parameters);
            $id = $this->db->lastInsertId();
            
            $media->setId($id);
            return $media;
            
        }
        
        public function getMediaById(string $id): ?Media {
            // READ
            $query = $this->db->prepare('SELECT name, description, alt, fileName, category, fileType, url FROM medias WHERE medias.id = :id');
            $parameters = [
                'id' => $id
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            try {
                if(!is_null($result)) {
                    return new Media($result['id'], $result['name'], $result['description']    , $result['alt'], $result['fileName'], $result['category'],     $result['fileType'], $result['url']);
                } else {
                    throw new Exception("This media doesn't exist");
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
        
        public function getMediaByName(string $name): ?Media {
            // READ
            $query = $this->db->prepare('SELECT name, description, alt, fileName, category, fileType, url FROM medias WHERE medias.name = :name');
            $parameters = [
                'name' => $name
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            if(!is_null($result)) {
                return new Media($result['id'], $result['name'], $result['description'], $result['alt'], $result['fileName'], $result['category'], $result['fileType'], $result['url']);
            }
            
            echo "This media doesn't exist";
            
        }
        
        public function updateMedia(Media $media): Media {
            // UPDATE
            $query = $this->db->prepare('UPDATE medias SET name = :name, description = :description, alt = :alt, fileName = :fileName, category = :category, fileType = :fileType, url = :url WHERE id = :id ');
            $parameters = [
                'id' => $media->getId(),
                'name' => $media->getName(),
                'description' => $media->getDescription(),
                'alt' => $media->getAlt(),
                'fileName' => $media->getFileName(),
                'category' => $media->getCategory(),
                'fileType' => $media->getFileType(),
                'url' => $media->getUrl()
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