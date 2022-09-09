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
        
        public function setName(): self {
            $this->name = $name;
            return $this;
        }
        public function setResume(): self {
            $this->resume = $resume;
            return $this;
        }
        public function setMediaId(): self {
            $this->media_id = $media_id;
            return $this;
        }
        public function setPageTypeId(): self {
            $this->page_type_id = $page_type_id;
            return $this;
        }
        public function setSlug(): self {
            $this->slug = $slug;
            return $this;
        }
        // update informations
    }

?>