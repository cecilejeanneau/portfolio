<?php

// require "./services/FileUploader.php";

    class ContactController extends AbstractController {
        
        public ContactManager $contactM;
        
        // Instantiation of Manager class to link with the db
        public function __construct() {
            $this->contactM = new ContactManager();
        }
            
        // Manage render for the template of contact page
        public function index(): void {
                $this->render($page = "contact");
        }
        
        public function handleContact(): void {
            try {
                if(isset($_POST["submit"])) {
                    
                        $id = null;
                        $name = $_POST["name"];
                        $content = $_POST["content"];
                        $email = $_POST["email"];
                        $tel = $_POST["phone"];
                        $media_id = null;
                        
                    $contact = new Contact($id, $name, $content, $email, $tel, $media_id);
                    
                    $contacted = $this->contactM->createContact($contact);
                    
                    $getContact = $this->contactM->getContactByName($name);
                    
                    // SOON HERE A FUTURE MANAGER FOR UPLOADING FILES
                    
                }
            } catch (Exception $e) {
                echo "Exception : ".$e->getMessage();
            }
        }
    }

?>