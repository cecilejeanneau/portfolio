<?php

    class Media {
        
        private ?int $id;
        private string $name;
        private string $description;
        private ?string $alt;
        private string $fileName;
        private string $category;
        private string $fileType;
        private string $url;
        
        public function __construct(?int $id, string $name, string $description, ?string $alt, string $fileName, string $category, string $fileType, string $url) {
            
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->alt = $alt;
            $this->fileName = $fileName;
            $this->category = $category;
            $this->fileType = $fileType;
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
            return $this->fileName;
        }
        public function getCategory(): string {
            return $this->category;
        }
        public function getFileType(): string {
            return $this->fileType;
        }
        public function getUrl(): string {
            return $this->url;
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
        public function setDescription(): self {
            $this->description = $description;
            return $this;
        }
        public function setAlt(): self {
            $this->alt = $alt;
            return $this;
        }
        public function setFileName(): self {
            $this->fileName = $fileName;
            return $this;
        }
        public function setCategory(): self {
            $this->category = $category;
            return $this;
        }
        public function setFileType(): self {
            $this->fileType = $fileType;
            return $this;
        }
        public function setUrl(): self {
            $this->url = $url;
            return $this;
        }
        // update informations
        
    }

?>