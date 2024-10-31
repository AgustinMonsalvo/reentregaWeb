<?php
require_once  'config.php';
class UsuarioModel {
    
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }
 
    public function getUserByEmail($email) {    
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
    public function agregarAuto($color, $modelo, $kilometros, $asientos, $informacion, $marca) {
   
        $queryMarca = $this->db->prepare('SELECT id_tablaMarca FROM marcas WHERE marca = ?');
        $queryMarca->execute([$marca]);
        $result = $queryMarca->fetch();
    
      
        $id_marca = $result['id_tablaMarca'];
    
       
        $query = $this->db->prepare('
            INSERT INTO autos (color, Modelo, kilometros, Asientos, Informacion, id_marca) 
            VALUES (?, ?, ?, ?, ?, ?)
        ');
    
        
        $query->execute([$color, $modelo, $kilometros, $asientos, $informacion, $id_marca]);
        
       
        return  $query;
    }
    public function editarAuto($color, $modelo, $kilometros, $asientos, $informacion, $marca, $id) {
       
        $queryMarca = $this->db->prepare('SELECT id_tablaMarca FROM marcas WHERE marca = ?');
        $queryMarca->execute([$marca]);
        $result = $queryMarca->fetch();
    
        
        $idMarca = $result['id_tablaMarca'];
    
        
        $query = $this->db->prepare('UPDATE autos SET color=?, Modelo=?, kilometros=?, Asientos=?, Informacion=?, id_marca=? WHERE id=?');
    
        $query->execute([$color, $modelo, $kilometros, $asientos, $informacion, $idMarca, $id]);
        
        return $query;
    }
    public function eliminarAuto($id) {
        
        $query = $this->db->prepare('DELETE FROM autos WHERE id=? ');
        $query->execute([$id]);
        
        return $query;
}


public function getTasks() {
      
    $query = $this->db->prepare('SELECT autos.*, marcas.marca FROM autos JOIN marcas ON autos.id_marca = marcas.id_tablaMarca;');

    $query->execute();

    
    $tasks = $query->fetchAll(PDO::FETCH_OBJ); 

    return $tasks;
}
 
   
    
}