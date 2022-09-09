<?php

    class PageType {
        
        private ?int $id;
        private string $name;
        private string $description;
        
        public function __construct(?int $id, string $name, string $description) {
            
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            
        }
        
        public function getName(): string {
            return $this->name;
        }
        public function getDescription(): string {
            return $this->description;
        }
        // get informations and display them for example
        
        public function setName(): self {
            $this->name = $name;
            return $this;
        }
        public function setDescription(): self {
            $this->description = $description;
            return $this;
        }
        // update informations
        
    }

?>