<?php

    class Project {
        
        private ?int $id;
        private string $name;
        private string $resume;
        private int $media_id;
        private int $page_type_id;
        private string $slug;
        
        public function __construct(?int $id, string $name, string $resume, int $media_id, int $page_type_id, string $slug) {
            
            $this->id = $id;
            $this->name = $name;
            $this->resume = $resume;
            $this->media_id = $media_id;
            $this->page_type_id = $page_type_id;
            $this->slug = $slug;
            
        }
        
        public function getName(): string {
            return $this->name;
        }
        public function getResume(): string {
            return $this->resume;
        }
        public function getMediaId(): int {
            return $this->media_id;
        }
        public function getPageTypeId(): int {
            return $this->page_type_id;
        }
        public function getSlug(): string {
            return $this->slug;
        }
        // get informations and display them for example
        
        public function setName(): void {
            $this->name = $name;
        }
        public function setResume(): void {
            $this->resume = $resume;
        }
        public function setMediaId(): void {
            $this->media_id = $media_id;
        }
        public function setPageTypeId(): void {
            $this->page_type_id = $page_type_id;
        }
        public function setSlug(): void {
            $this->slug = $slug;
        }
        // update informations
    }

?>