<?php

    class Page {
        
        private ?int $id;
        private string $name;
        private string $slug;
        private int $page_type_id;
        
        public function __construct(?int $id, string $name, string $slug, int $page_type_id) {
            
            $this->id = $id;
            $this->name = $name;
            $this->slug = $slug;
            $this->page_type_id = $page_type_id;
            
        }
        
        public function getName(): string {
            return $this->name;
        }
        public function getSlug(): string {
            return $this->slug;
        }
        public function getPageTypeId(): int {
            return $this->page_type_id;
        }
        // get informations and display them for example
        
        public function setName(): void {
            $this->name = $name;
        }
        public function setSlug(): void {
            $this->slug = $slug;
        }
        public function setPageTypeId(): void {
            $this->page_type_id = $page_type_id;
        }
        // update informations
        
    }

?>