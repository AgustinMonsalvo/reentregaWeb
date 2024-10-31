<?php

require_once  'modelo/modelo.php';
require_once  'vista/vista.php';




class TaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function showTasks() {
        $autos = $this->model->getTasks();
        $this->view->showAutos($autos); 
    }
    
    public function showDetalles($id) {
        $detalles = $this->model->getDetalles($id);
        $this->view->showDetalles($detalles); 
    }

    public function buscarCatalogos($atributo, $valor) {
        $catalogo = $this->model->getTasksCatalogo($atributo, $valor);
        $this->view->showCatalogo($catalogo); 
      
        
        
    }
}






?>
