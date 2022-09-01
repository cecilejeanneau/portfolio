<?php

require_once "./entities/User.php";

    class UserManager extends AbstractManager {
        
        // IDENTITY VERIFICATION
        // public function  validId(User $user): User {
        //     // ...
        // }
        // public User $user;
        
        // public function __construct(){
        //     $this->user = new User();
        // }
        
        // CRUD : CREATE READ UPDATE DELETE
        public function createUser(User $user): User {
            // CREATE
            $query = $this->db->prepare('INSERT INTO users(username, password, email) VALUES (:username, :password, :email)');
            $parameters = [
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail()
            ];
            $query->execute($parameters);
            $id = $this->db->lastInsertId();
            
            $user->setId($id);
            return $user;
            
        }
        
        public function getUserByUsername(string $username): ?User {
            // READ
            $query = $this->db->prepare('SELECT id, username, password, email FROM users WHERE users.username = :username');
            $parameters = [
                'username' => $username
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            try {
                if($result) {
                    return new User($result['id'], $result['username'], $result['password'], $result['email']);
                } else {
                    throw new Exception("This user doesn't exist");
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
                return null;
            }
        }
        
        public function updateUser(User $user): User {
            // UPDATE
            $query = $this->db->prepare('UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id ');
            $parameters = [
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail(),
                'id' => $user->getId(),
            ];
            $query->execute($parameters);
                
            return $user;
            
        }
        
        public function deleteUser(User $user): User {
            // DELETE
            $query = $this->db->prepare('DELETE FROM users WHERE username = :username ');
            $query->execute();
                
            echo "This user has been successfully deleted";
            
        }
    
    }

?>