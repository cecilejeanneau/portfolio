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
        
        public function setName(): void {
            $this->name = $name;
        }
        public function setDescription(): void {
            $this->description = $description;
        }
        // update informations
        
    }

?>