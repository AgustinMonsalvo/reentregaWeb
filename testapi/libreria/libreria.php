<?php
class Request {
    public $body = null;
    public $params = null; 
    public $url = null; 

    public function __construct() {
        try {
           
            $this->body = json_decode(file_get_contents('php://input'));
        } catch (Exception $e) {
            $this->body = null; 
        }
        
       
        $this->params = (object) $_GET; 
       
        $this->url = $_SERVER['REQUEST_URI']; 
    }
}


