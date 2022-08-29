<?php

    abstract class AbstractManager {
        
        private static $db; 
        
        protected function __construct() {
            if(is_null($db)) {
                throw new MyDBException($pdoe->getMessage(), hexdec($pdoe->getCode()), $pdoe);
            }
        }
        
        protected function connection() {
            $db = new PDO('mysql:host=db.3wa.io;port=3306;dbname=cecilejeanneau_distorsion_project','cecilejeanneau','32da58d8f8e9297ba228dd3b6a91430b');
        }
        
    }

?>