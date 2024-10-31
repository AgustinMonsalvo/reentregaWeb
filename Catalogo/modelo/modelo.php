<?php
require_once  'config.php';


class TaskModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
       $this->_deploy();
    }
    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
    
        if (count($tables) == 0) {
            
            $sql = file_get_contents('deploy.sql'); 
           
            $this->db->exec($sql);
        }
    }
    
 
    public function getTasks() {
      
        $query = $this->db->prepare('SELECT autos.*, marcas.marca FROM autos JOIN marcas ON autos.id_marca = marcas.id_tablaMarca;');

        $query->execute();
    
        
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
    public function getDetalles($id) {    
        $query = $this->db->prepare('SELECT autos.id,autos.color,autos.kilometros,autos.Modelo,autos.Asientos,autos.Informacion,marcas.marca FROM autos JOIN 
        marcas ON autos.id_marca = marcas.id_TablaMarca WHERE  autos.id = ?; ');
        $query->execute([$id]);   
    
        $task = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $task;
    }
    public function getTasksCatalogo($atributo, $valor) {  
        
        $query = $this->db->prepare("SELECT autos.*, marcas.marca 
                                  FROM autos 
                                  JOIN marcas ON autos.id_marca = marcas.id_TablaMarca 
                                  WHERE $atributo = :valor");
    
        $query->bindParam(':valor', $valor);
    
        $query->execute();
    
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $tasks;


}
}


?>