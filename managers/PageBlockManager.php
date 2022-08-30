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
        
        public function getPageBlockById(string $id): ?PageBlock {
            // READ
            $query = $this->db->prepare('SELECT name, page_id, media_id, page_block_type_id FROM page_blocks WHERE page_blocks.id = :id');
            $parameters = [
                'id' => $id
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            try {
                if(!is_null($result)) {
                    return new PageBlock($result['id'], $result['name'], $result['page_id'],     $result['media_id'], $result['page_block_type_id']);
                } else {
                    throw new Exception("This page block doesn't exist");
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
        
        
        function getMessageByRoom($messageRoom) :?array 
{
    $db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=cecilejeanneau_distorsion_project',
    'cecilejeanneau',
    '32da58d8f8e9297ba228dd3b6a91430b'
    );
    
    $query = $db->prepare('SELECT * FROM messages JOIN rooms ON rooms.id = messages.room_id WHERE rooms.name = :messageRoom');
    $parameters = [
        'messageRoom' => $messageRoom
        // function parameter name the room where the messages are from
    ];
    $query->execute($parameters);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
        
        
        public function getPageBlockById(string $id): ?PageBlock {
            // READ
            $query = $this->db->prepare('SELECT page_blocks.id, page_blocks.name, page_block_types.name FROM page_blocks JOIN page_block_types ON page_block_types.id = page_blocks.page_block_type_id WHERE page_blocks.id = :id');
            $parameters = [
                'id' => $id
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // returns the result in an associative array
            
            try {
                if(!is_null($result)) {
                    return new PageBlock($result['id'], $result['name'], $result['page_block_type_id']);
                } else {
                    throw new Exception("This page block doesn't exist");
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
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