<?php

    class MessagingController extends AbstractController {
        
        public ContactManager $contactM;
        // public 
        
        // Instantiation of Manager class to link with the db
        public function __construct() {
            $this->contactM = new ContactManager();
        }
            
        // Manage render for the template of contact page
        public function index(): void {
            session_start();
            if(!empty($_SESSION)) {
                if(isset($_SESSION["connect"])) {
                    if($_SESSION["connect"] === true){
                    $this->render($page = "messages");
                    // method for child class form AbstractController : need to extends
                    } 
                }    
            } else {
                header("Location: home");
                    
                exit;
            }
        }
        
        public function getMessage(): array {
            
            $results = $this->contactM->getAllContacts();
            
            return $results;
        }
        
    }

?>