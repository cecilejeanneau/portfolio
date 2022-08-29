<?php

require_once "./managers/AbstractManager.php";

    class ProjectManager extends AbstractManager {
        
        private function dbConnect(){
            $this->__construct();
        }
        
        // A PROJECT IS A PAGE SO A PROJECTMANAGER IS NOT REALLY NEEDED
        
        // // CRUD : CREATE READ UPDATE DELETE
        // public function createUser(User $user): User {
        //     // CREATE
        //     $query = $this->db->prepare('INSERT INTO users(username, password, email) VALUES (:username, :password, :email)');
        //     $parameters = [
        //         'username' => $user->getUsername(),
        //         'password' => $user->getPassword(),
        //         'email' => $user->getEmail()
        //     ];
        //     $query->execute($parameters);
        //     $id = $this->db->lastInsertId();
            
        //     $user->setId($id);
        //     return $user;
            
        // }
        
        // public function getUserByUsername(string $username): ?User {
        //     // READ
        //     $query = $this->db->prepare('SELECT username, password, email FROM user WHERE user.username = :username');
        //     $parameters = [
        //         'username' => $username
        //     ];
        //     $query->execute($parameters);
        //     $result = $query->fetch(PDO::FETCH_ASSOC);
            
        //     if(!is_null($result))
        //     {
        //         return new User($result['id'], $result['username'], $result['password'], $result['email']);
        //     }
            
        //     echo "This user doesn't exist";
            
        // }
        
        // public function updateUser(User $user): User {
        //     // UPDATE
        //     $query = $this->db->prepare('UPDATE user SET username = :username, password = :password, email = :email WHERE id = :id ');
        //     $parameters = [
        //         'username' => $user->getUsername(),
        //         'password' => $user->getPassword(),
        //         'email' => $user->getEmail(),
        //         'id' => $user->getId(),
        //     ];
        //     $query->execute($parameters);
                
        //     return $user;
            
        // }
        
        // public function deleteUser(User $user): User {
        //     // DELETE
        //     $query = $this->db->prepare('DELETE FROM users WHERE username = :username ');
        //     $query->execute();
                
        //     echo "This user has been successfully deleted";
            
        // }
        
    }

?>