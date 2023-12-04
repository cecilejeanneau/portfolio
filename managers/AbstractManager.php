<?php

    abstract class AbstractManager {
        
        protected PDO $db;
        
        public function __construct() {
            $this->db = new PDO('mysql:host=db.3wa.io;port=3306;dbname=cecilejeanneau_parade_ox','cecilejeanneau','32da58d8f8e9297ba228dd3b6a91430b');
        }
        
    }

?>