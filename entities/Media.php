<?php

    class Media {
        
        private ?int $id;
        private string $name;
        private string $description;
        private ?string $alt;
        private string $filename;
        private string $category;
        private string $file_type;
        
        public function __construct(?int $id, string $name, string $description, ?string $alt, string $filename, string $category, string $file_type) {
            
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->alt = $alt;
            $this->filename = $filename;
            $this->category = $category;
            $this->file_type = $file_type;
            
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
        // get informations and display them for example
        
        public function setName(): void {
            $this->name = $name;
        }
        public function setDescription(): void {
            $this->description = $description;
        }
        public function setAlt(): void {
            $this->alt = $alt;
        }
        public function setFileName(): void {
            $this->filename = $filename;
        }
        public function setCategory(): void {
            $this->category = $category;
        }
        public function setFileType(): void {
            $this->file_type = $file_type;
        }
        // update informations
        
    }

?>