<?php

    class PageBlockType {
        
        private ?int $id;
        private string $name;
        
        public function __construct(?int $id, string $name) {
            
            $this->id = $id;
            $this->name = $name;
            
        }
        
        public function getName(): string {
            return $this->name;
        }
        // get informations and display them for example
        
        public function setName(): self {
            $this->name = $name;
            return $this;
        }
        // update informations
        
    }

?>