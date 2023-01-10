<?php

    class Contact {
        
        private ?int $id;
        private string $name;
        private string $content;
        private string $email;
        private string $tel;
        private ?int $media_id;
        
        public function __construct(?int $id, string $name, string $content, string $email, string $tel, ?int $media_id) {
            
            $this->id = $id;
            $this->name = $name;
            $this->content = $content;
            $this->email = $email;
            $this->tel = $tel;
            $this->media_id = $media_id;
            
        }
        
        public function getId(): int {
            return $this->id;
        }
        public function getName(): string {
            return $this->name;
        }
        public function getContent(): string {
            return $this->content;
        }
        public function getEmail(): string {
            return $this->email;
        }
        public function getTel(): string {
            return $this->tel;
        }
        public function getMediaId(): int {
            return $this->media_id;
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
        public function setContent(): self {
            $this->content = $content;
            return $this;
        }
        public function setEmail(): self {
            $this->email = $email;
            return $this;
        }
        public function setTel(): self {
            $this->tel = $tel;
            return $this;
        }
        public function setMediaId(): self {
            $this->media_id = $media_id;
            return $this;
        }
        // update informations
        
    }

?>