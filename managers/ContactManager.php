<?php

// use for entities with fetch_class pdo PDO::FETCH_CLASS return instance class from SQL request

    class ContactManager extends AbstractManager {
        
        // CRUD : CREATE READ UPDATE DELETE
        public function createContact(Contact $contact): Contact {
            // CREATE
            
            $query = $this->db->prepare('INSERT INTO contacts(name, content, email, tel) VALUES (:name, :content, :email, :tel)');
                // prepare() method from PDO enable to protect from MYSQL injections
            
            $parameters = [
                'name' => $contact->getName(),
                'content' => $contact->getContent(),
                'email' => $contact->getEmail(),
                'tel' => $contact->getTel()
            ];
            
            $query->execute($parameters);
            $id = $this->db->lastInsertId();
            
            return $contact;
            
            $contact->setId($id);
            $contact->setMediaId($media_id);
        }
        
        public function getContactByName(string $name): ?Contact {
            // READ
            
            $query = $this->db->prepare('SELECT id, name, content, email, tel, media_id FROM contacts WHERE contacts.name = :name');
            $parameters = [
                'name' => $name
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
                // returns the result in an associative array
                
            try {
                if(!is_null($result)) {
                    return new Contact($result['id'], $result['name'], $result['content'], $result['email'], $result['tel'], $result['media_id']);
                } else {
                    throw new Exception("This contact doesn't exist");
                }
            } catch (Exception $e) {
                //  if there's an error
                echo "Exception : ".$e->getMessage();
            }
            
        }
        
        public function getAllContacts(): array {
            // READ
            
            $query = $this->db->prepare('SELECT id, name, email, content, tel FROM contacts');
            
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                // returns each element of the result as an array in an associative array
                
            try {
                if(!is_null($results)) {
                    return $results;
                } else {
                    throw new Exception("There's no message");
                }
            } catch (Exception $e) {
                //  if there's an error
                echo "Exception : ".$e->getMessage();
            }
            
        }
        
        public function updateContact(Contact $contact): Contact {
            // UPDATE
            
            $query = $this->db->prepare('UPDATE contacts SET name = :name, content = :content, email = :email, tel = :tel, media_id = :media_id WHERE id = :id ');
            $parameters = [
                'id' => $contact->getId(),
                'name' => $contact->getName(),
                'content' => $contact->getContent(),
                'email' => $contact->getEmail(),
                'tel' => $contact->getTel(),
                'media_id' => $contact->getMediaId()
            ];
            $query->execute($parameters);
                
            return $contact;
            
        }
        
        public function deleteContact(Contact $contact): Contact {
            // DELETE
            
            $query = $this->db->prepare('DELETE FROM contacts WHERE name = :name ');
            $query->execute();
                
            echo "This contact has been successfully removed";
            
        }
        
    }

?>