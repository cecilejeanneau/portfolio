<?php

require_once "./managers/AbstractManager.php";

    class PageManager extends AbstractManager {
        
        private function dbConnect(){
            $this->__construct();
        }
        
        // CRUD : CREATE READ UPDATE DELETE
        public function createPage(Page $page): Page {
            // CREATE
            $query = $this->db->prepare('INSERT INTO pages(name, slug, page_type_id) VALUES (:name, :slug, :page_type_id)');
            // prepare() method from PDO enable to protect from MYSQL injections
            
            $parameters = [
                'name' => $page->getName(),
                'slug' => $page->getSlug(),
                'page_type_id' => $page->getPageTypeId()
            ];
            $query->execute($parameters);
            $id = $this->db->lastInsertId();
            
            $page->setId($id);
            return $page;
            
        }
        
        public function getPageByName(string $name): ?Page {
            // READ
            $query = $this->db->prepare('SELECT name, slug, page_type_id FROM pages WHERE pages.name = :name');
            $parameters = [
                'name' => $name
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            if(!is_null($result))
            {
                return new Page($result['id'], $result['name'], $result['slug'], $result['page_type_id']);
            }
            
            echo "This page doesn't exist";
            
        }
        
        public function updatePage(Page $page): Page {
            // UPDATE
            $query = $this->db->prepare('UPDATE pages SET name = :name, slug = :slug, page_type_id = :page_type_id WHERE id = :id ');
            $parameters = [
                'id' => $page->getId(),
                'name' => $page->getName(),
                'slug' => $page->getSlug(),
                'page_type_id' => $page->getPageTypeId()
            ];
            $query->execute($parameters);
                
            return $page;
            
        }
        
        public function deletePage(Page $page): Page {
            // DELETE
            $query = $this->db->prepare('DELETE FROM pages WHERE name = :name ');
            $query->execute();
                
            echo "This page has been successfully removed";
            
        }
        
    }

?>