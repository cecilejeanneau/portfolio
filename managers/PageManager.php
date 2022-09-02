<?php

// require_once "./managers/AbstractManager.php";

    class PageManager extends AbstractManager {
        
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
        
        public function getPageById(string $id): ?Page {
            // READ
            $query = $this->db->prepare('SELECT pages.id, pages.name, pages.slug, page_types.name, page_types.description FROM pages JOIN page_types ON page_types.id = pages.page_type_id WHERE pages.id = :id');
            $parameters = [
                'id' => $id
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            try {
                if(!is_null($result)) {
                    return new Page($result['id'], $result['name'], $result['slug'], $result['page_type_id']);
                    // think about add page_types data later
                } else {
                    throw new Exception("This page doesn't exist");
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
        
        public function getPageBySlug(string $slug): ?Page {
            // READ
            $query = $this->db->prepare('SELECT pages.id, pages.name, pages.slug, page_types.name, page_types.description FROM pages JOIN page_types ON page_types.id = pages.page_type_id WHERE pages.slug = :slug');
            $parameters = [
                'slug' => $slug
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            try {
                if(!is_null($result)) {
                    return new Page($result['id'], $result['name'], $result['slug'], $result['page_type_id']);
                    // think about add page_types data later
                } else {
                    throw new Exception("This page doesn't exist");
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
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