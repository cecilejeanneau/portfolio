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
        
        public function getName(): string {
            return $this->name;
        }
        public function getPageId(): string {
            return $this->page_id;
        }
        public function getMediaId(): string {
            return $this->media_id;
        }
        public function getPageBlockTypeId(): string {
            return $this->page_block_type_id;
        }
        // get informations and display them for example
        
        public function setName(): void {
            $this->name = $name;
        }
        public function setPageId(): void {
            $this->page_id = $page_id;
        }
        public function setMediaId(): void {
            $this->media_id = $media_id;
        }
        public function setPageBlockTypeId(): void {
            $this->page_block_type_id = $page_block_type_id;
        }
        // update informations
        
    }

?>