<?php

// require_once "./managers/AbstractManager.php";

    class PageBlockManager extends AbstractManager {
        
        // CRUD : CREATE READ UPDATE DELETE
        public function createPageBlock(PageBlock $page_block): PageBlock {
            // CREATE
            $query = $this->db->prepare('INSERT INTO page_blocks(name, page_id, media_id, page_block_type_id) VALUES (:name, :page_id, :media_id, :page_block_type_id)');
            // prepare() method from PDO enable to protect from MYSQL injections
            
            $parameters = [
                'name' => $page_block->getName(),
                'page_id' => $page_block->getPageId(),
                'media_id' => $page_block->getMediaId(),
                'page_block_type_id' => $page_block->getPageBlockTypeId()
            ];
            $query->execute($parameters);
            $id = $this->db->lastInsertId();
            
            $page_block->setId($id);
            return $page_block;
            
        }
        
        public function getPageBlockByName(string $name): ?PageBlock {
            // READ
            $query = $this->db->prepare('SELECT name, page_id, media_id, page_block_type_id FROM page_blocks WHERE page_blocks.name = :name');
            $parameters = [
                'name' => $name
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            if(!is_null($result))
            {
                return new PageBlock($result['id'], $result['name'], $result['page_id'], $result['media_id'], $result['page_block_type_id']);
            }
            
            echo "This page block doesn't exist";
            
        }
        
        public function updatePageBlock(PageBlock $page_block): PageBlock {
            // UPDATE
            $query = $this->db->prepare('UPDATE page_blocks SET name = :name, page_id = :page_id, media_id = :media_id, page_block_type_id = :page_block_type_id WHERE id = :id ');
            $parameters = [
                'id' => $page_block->getId(),
                'name' => $page_block->getName(),
                'page_id' => $page_block->getPageId(),
                'media_id' => $page_block->getMediaId(),
                'page_block_type_id' => $page_block->getPageBlockTypeId()
            ];
            $query->execute($parameters);
                
            return $page_block;
            
        }
        
        public function deletePageBlock(PageBlock $page_block): PageBlock {
            // DELETE
            $query = $this->db->prepare('DELETE FROM page_blocks WHERE name = :name ');
            $query->execute();
                
            echo "This page block has been successfully removed";
            
        }
        
    }

?>