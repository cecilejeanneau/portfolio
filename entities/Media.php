<?php

    class Media {
        
        private ?int $id;
        private string $name;
        private string $description;
        private ?string $alt;
        private string $filename;
        private string $category;
        private string $file_type;
        private string $url;
        
        public function __construct(?int $id, string $name, string $description, ?string $alt, string $filename, string $category, string $file_type, string $url) {
            
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->alt = $alt;
            $this->filename = $filename;
            $this->category = $category;
            $this->file_type = $file_type;
            $this->url = $url;
            
        }
        
        public function getId(): int {
            return $this->id;
        }
        public function getName(): string {
            return $this->name;
        }
        public function getDescription(): string {
            return $this->description;
        }
        public function getAlt(): string {
            return $this->alt;
        }
        public function getFileName(): string {
            return $this->filename;
        }
        public function getCategory(): string {
            return $this->category;
        }
        public function getFileType(): string {
            return $this->file_type;
        }
        public function getUrl(): string {
            return $this->url;
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
        public function setDescription() {
            $this->description = $description;
            return $this;
        }
        public function setAlt() {
            $this->alt = $alt;
            return $this;
        }
        public function setFileName() {
            $this->filename = $filename;
            return $this;
        }
        public function setCategory() {
            $this->category = $category;
            return $this;
        }
        public function setFileType() {
            $this->file_type = $file_type;
            return $this;
        }
        public function setUrl() {
            $this->url = $url;
            return $this;
        }
        // update informations
        
    }

?>