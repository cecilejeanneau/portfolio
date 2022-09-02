<?php

    class PageBlock {
        
        private ?int $id;
        private string $name;
        private int $page_id;
        private int $media_id;
        private int $page_block_type_id;
        
        public function __construct(?int $id, string $name, int $page_id, int $media_id, int $page_block_type_id) {
            
            $this->id = $id;
            $this->name = $name;
            $this->page_id = $page_id;
            $this->media_id = $media_id;
            $this->page_block_type_id = $page_block_type_id;
            
        }
        
        public function getId(): int {
            return $this->id;
        }
        public function getName(): string {
            return $this->name;
        }
        public function getPageId(): int {
            return $this->page_id;
        }
        public function getMediaId(): int {
            return $this->media_id;
        }
        public function getPageBlockTypeId(): int {
            return $this->page_block_type_id;
        }
        // get informations and display them for example
        
        public function setId() {
            $this->id = $id;
            return $this;
        }
        public function setName() {
            $this->name = $name;
            return $this;
        }
        public function setPageId() {
            $this->page_id = $page_id;
            return $this;
        }
        public function setMediaId() {
            $this->media_id = $media_id;
            return $this;
        }
        public function setPageBlockTypeId() {
            $this->page_block_type_id = $page_block_type_id;
            return $this;
        }
        // update informations
        
    }

?>