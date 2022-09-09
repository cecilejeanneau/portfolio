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
        
        public function getId(): int {
            return $this->id;
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
        
        public function setId(): self {
            $this->id = $id;
            return $this;
        }
        public function setName(): self {
            $this->name = $name;
            return $this;
        }
        public function setSlug(): self {
            $this->slug = $slug;
            return $this;
        }
        public function setPageTypeId(): self {
            $this->page_type_id = $page_type_id;
            return $this;
        }
        // update informations
        
    }

?>