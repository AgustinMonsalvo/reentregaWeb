<?php

class TaskView {

    public function showAutos($autos) {
        require 'templates/encabezado.phtml'; 
        require 'templates/tablaAutos.phtml';
        require 'templates/catalogo.phtml'; 
        require 'templates/footer.phtml'; 
    }

    public function showDetalles($detalles) {
        require 'templates/encabezado.phtml'; 
        require 'templates/detalleAuto.phtml'; 
        require 'templates/footer.phtml'; 
    }

    public function showCatalogo($catalogo) {
        require 'templates/encabezado.phtml'; 
        require 'templates/tablaCatalogo.phtml'; 
        require 'templates/footer.phtml'; 
    }
    
}
?>


      
    

    

