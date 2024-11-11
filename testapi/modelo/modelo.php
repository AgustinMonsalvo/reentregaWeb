<?php
require_once  'config.php';
class TaskModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    
    
    public function GetModel($orderBy){
       
        $sql = 'SELECT autos.*, marcas.marca FROM autos JOIN marcas ON autos.id_marca = marcas.id_tablaMarca';
       
        if ($orderBy === 'modelo' ) {
           
            $sql .= ' ORDER BY Modelo DESC'; }
        
    
    
       
        $query = $this->db->prepare($sql);
        $query->execute();
        
       
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $tasks;
    }
   
    
    
    public function Verify($id) {
        if ($id !== null) {
            $sql = 'SELECT * FROM autos WHERE id = ?'; 
    
            $query = $this->db->prepare($sql);
            $query->execute([$id]); 
    
            $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
            if (empty($tasks)) { 
                return null; 
            }
            return $tasks; 
        }
        
        return null; 
    }

    public function GetForId($id){

        $query = $this->db->prepare('SELECT autos.*, marcas.marca 
        FROM autos 
        JOIN marcas ON autos.id_marca = marcas.id_tablaMarca 
        WHERE autos.id = ?');
    
        $query->execute([$id]);  
        
        $task = $query->fetchAll(PDO::FETCH_OBJ); 
        return $task; 
    }
    

    public function editCar($color, $Modelo, $Kilometros, $Asientos, $Informacion, $id_marca, $id)
    {
       
        $query = $this->db->prepare("UPDATE autos SET color=?, Modelo=?, Kilometros=?, Asientos=?, Informacion=?, id_marca=? WHERE id=?");
        $query->execute([$color, $Modelo, $Kilometros, $Asientos, $Informacion, $id_marca, $id]);
    
      
        $querys = $this->db->prepare('SELECT autos.*, marcas.marca  FROM autos  JOIN marcas ON autos.id_marca = marcas.id_tablaMarca');
        $querys->execute(); 
    
        
        $tasks = $querys->fetchAll(PDO::FETCH_OBJ);
    
        return $tasks;
    }
    public function InsertCars($color, $modelo, $kilometros, $asientos, $informacion, $id_marca) {
        $query = $this->db->prepare('INSERT INTO autos (color, Modelo, kilometros, Asientos, Informacion, id_marca)   VALUES (?, ?, ?, ?, ?, ?)');

    
    $query->execute([$color, $modelo, $kilometros, $asientos, $informacion, $id_marca]);
    
        
        $querys = $this->db->prepare('SELECT autos.*, marcas.marca  FROM autos JOIN marcas ON autos.id_marca = marcas.id_tablaMarca');
        $querys->execute(); 
    
        
        $tasks = $querys->fetchAll(PDO::FETCH_OBJ);
    
        return $tasks;
    }

    public function getPaginaAutos($limit, $offset){
        $query = $this->db->prepare("SELECT autos.*, marcas.marca FROM autos JOIN marcas ON autos.id_marca = marcas.id_tablaMarca LIMIT :limit OFFSET :offset;");
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

   public function crearColumnaOferta() {
        $query = $this->db->prepare("ALTER TABLE autos ADD COLUMN oferta TINYINT(1) DEFAULT 0");
        $query->execute(); 
    
        $querys = $this->db->prepare("SELECT * FROM autos");
        $querys->execute();
        $tasks = $querys->fetchAll(PDO::FETCH_OBJ);
    
        return $tasks;
    }
    public function  ActualizarOferta($oferta, $id){
        $query = $this->db->prepare("UPDATE autos SET oferta = :oferta WHERE id = :id");
    $query->bindParam(':oferta', $oferta, PDO::PARAM_INT);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    
    
    $query->execute();

    
    $querys = $this->db->prepare("SELECT * FROM autos WHERE id = :id");
    $querys->bindParam(':id', $id, PDO::PARAM_INT);
    $querys->execute();
    $Task = $querys->fetch(PDO::FETCH_OBJ);
    
    return $Task;
    }
}
    
    
        
       
    
    
    

    
    