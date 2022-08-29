<?php

    class Contact {
        
        private ?int $id;
        private string $name;
        private string $content;
        private string $email;
        private string $tel;
        private int $media_id;
        
        public function __construct(?int $id, string $name, string $content, string $email, string $tel, int $media_id) {
            
            $this->id = $id;
            $this->name = $name;
            $this->content = $content;
            $this->email = $email;
            $this->tel = $tel;
            $this->media_id = $media_id;
            
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
        
        public function setName(): void {
            $this->name = $name;
        }
        public function setContent(): void {
            $this->content = $content;
        }
        public function setEmail(): void {
            $this->email = $email;
        }
        public function setTel(): void {
            $this->tel = $tel;
        }
        public function setMediaId(): void {
            $this->media_id = $media_id;
        }
        // update informations
        
    }

?>