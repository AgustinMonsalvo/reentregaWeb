<?php

require_once  'modelo/modelo.php';
require_once  'vista/vista.php';
class controlador {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new Response();
    }

    
    public function GetList_GetDesc($request) {
        $orderBy = null; 
        $status = '200';
    
       
        if (isset($request->params->desc)) {
            $orderBy = $request->params->desc; 
            
            
            if ( $orderBy != 'modelo') {
                $tasks = null;
                $status = '400';
                return $this->view->response($tasks, $status);
            }
        }
    
        
        $task = $this->model->GetModel($orderBy);
        return $this->view->response($task, $status);
    }
    
    
    

    public function GetId($request) {
        $status = '400';

        $id = $request->params->id; 
    
       
        $task = $this->model->Verify($id);
    
       
        if ($task === null) {
            
            return $this->view->response($task,$status);
        }
else {
    $status = '200';
        $tasks = $this->model->GetForId($id);
          return $this->view->response($tasks,$status);}
    
       
       
    }
    public function editCars($request){
        $status='200';
        $tasks=null;
        $color = isset($request->body->color) ? $request->body->color : null;
        $modelo = isset($request->body->Modelo) ? $request->body->Modelo : null;
        $kilometros = isset($request->body->Kilometros) ? $request->body->Kilometros : null;
        $asientos = isset($request->body->Asientos) ? $request->body->Asientos : null;
        $informacion = isset($request->body->Informacion) ? $request->body->Informacion : null;
        $id_marca = isset($request->body->id_marca) ? $request->body->id_marca : null;
        $id = isset($request->params->id) ? $request->params->id : null;

        $Verify = $this->model->Verify($id);
        if(empty($Verify)){
            $status='400';
           
            return $this->view->response($tasks,$status);
        }



        if (isset($color, $modelo, $kilometros, $asientos, $informacion, $id_marca, $id)) {
            $tasks = $this->model->editCar($color, $modelo, $kilometros, $asientos, $informacion, $id_marca, $id);
            return $this->view->response($tasks,$status);  
        } else {
            $status='400';
            return $this->view->response($tasks,$status); } 
        }
    
    public function InsertCars($request){
        $status='201';
        $tasks=null;
        $color = isset($request->body->color) ? $request->body->color : null;
        $modelo = isset($request->body->Modelo) ? $request->body->Modelo : null;
        $kilometros = isset($request->body->Kilometros) ? $request->body->Kilometros : null;
        $asientos = isset($request->body->Asientos) ? $request->body->Asientos : null;
        $informacion = isset($request->body->Informacion) ? $request->body->Informacion : null;
        $id_marca = isset($request->body->id_marca) ? $request->body->id_marca : null;
      

       



        if (isset($color, $modelo, $kilometros, $asientos, $informacion, $id_marca)) {
            $tasks = $this->model->InsertCars($color, $modelo, $kilometros, $asientos, $informacion, $id_marca);
            return $this->view->response($tasks,$status);  
        } else {
            $status='400';
            return $this->view->response($tasks,$status); } 
        }



        public function Paginar() {
            $tasks = null;
            $status = '200';
        
            
            if (!isset($_GET['page']) || !isset($_GET['limit'])) {
                $status = '400';
                return $this->view->response($tasks, $status);
            }
        
            $page = (int)$_GET['page'];
            $limit = (int)$_GET['limit'];
        
            
            if ($page <= 0 || $limit <= 0) {
                $status = '400';
                return $this->view->response($tasks, $status);
            }
        
           
            $offset = ($page - 1) * $limit;
        
            $tasks = $this->model->getPaginaAutos($limit, $offset);
        
          
            if (empty($tasks)) {
                $status = '404'; 
                return $this->view->response($tasks, $status);
            }
        
            return $this->view->response($tasks, $status);
        }
        public function CreateColumn(){
            $status=201;
            $tasks= $this->model->crearColumnaOferta();
            return $this->view->response($tasks, $status);
        }
        public function ModifyOferta($request){
            $status='200';
            $tasks=null;
            $id = isset($request->params->id) ? $request->params->id : null;

            $Verify = $this->model->Verify($id);
            if(empty($Verify)){
                $status='400';
               
                return $this->view->response($tasks,$status);
            }
            $oferta = isset($request->body->oferta) ? $request->body->oferta : null;
            if (isset($oferta,$id)) {
                $tasks = $this->model->ActualizarOferta($oferta, $id);
                return $this->view->response($tasks,$status);  
            } else {
                $status='400';
                return $this->view->response($tasks,$status); } 
            }

        }




