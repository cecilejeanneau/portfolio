<?php

    class User {
        
        private ?int $id;
        private string $username;
        private string $password;
        private string $email;
        
        public function __construct(?int $id, string $username, string $password, string $email) {
            
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            
        }
        
        public function getId(): int {
            return $this->id;
        }
        public function getUsername(): string {
            return $this->username;
        }
        public function getPassword(): string {
            return $this->password;
        }
        public function getEmail(): string {
            return $this->email;
        }
        // get informations and display them for example
        
        public function setId() {
            $this->id = $id;
            return $this;
        }
        public function setUsername() {
            $this->username = $username;
            return $this;
        }
        public function setPassword() {
            $this->password = $password;
            return $this;
        }
        public function setEmail() {
            $this->email = $email;
            return $this;
        }
        // update informations
    }

?>