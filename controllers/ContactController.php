<?php

    class ContactController extends AbstractController {
            
            public function index(): void {
                $this->render($page = "contact");
            }
            
        }

?>