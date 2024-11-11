<?php

class Response {
    public function response($task, $status ) {
        header("Content-Type: text/html"); 
        $statusText = $this->_requestStatus($status);
        header("HTTP/1.1 $status, $statusText");
     
        if (empty($task)) {
            echo "<p>Error en la consulta</p>"; 
            return; 
        }
        echo json_encode($task);
       
    }

    private function _requestStatus($status) {
        switch ($status) {
            case 200:
                return "OK";
            case 201:
                return "Created";
                case 400:
                    return "Bad Request";
          
        }
    }
}

    




