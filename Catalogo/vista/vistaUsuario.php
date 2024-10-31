<?php


class UsuarioView {
   

    public function showLogin() {
        require  'templates/encabezadoUsuario.phtml'; 
        require  'templates/formularioUsuario.phtml'; 
        require  'templates/footer.phtml'; 
    }
    public function showErrorRol() {
        
        require  'templates/encabezadoUsuario.phtml'; 
        echo '<h1 style="text-align: center; color: red;">Rol no valido</h1>';
        require  'templates/formularioUsuario.phtml'; 
        require  'templates/footer.phtml'; 
       
    
}
public function showErrorContraseña() {
    require  'templates/encabezadoUsuario.phtml';  
    echo '<h1 style="text-align: center; color: red;">Contraseña no valida</h1>';
    require  'templates/formularioUsuario.phtml'; 
    require  'templates/footer.phtml'; 
}
public function showErrorUsuario() {
    require  'templates/encabezadoUsuario.phtml';  
    echo '<h1 style="text-align: center; color: red;">Usuario no encontrado</h1>';
    require  'templates/formularioUsuario.phtml'; 
    require  'templates/footer.phtml'; 
}
public function showErrorAmbos() {
    require  'templates/encabezadoUsuario.phtml'; 
    echo '<h1 style="text-align: center; color: red;">Contraseña y usuario no validos</h1>';
    require  'templates/formularioUsuario.phtml'; 
    require  'templates/footer.phtml'; 
}

public function showAutosAgregados()
    {
        require  'templates/encabezadoUsuario.phtml'; 
        require  'templates/tablaAgregar.phtml';
        
        require  'templates/footer.phtml';
    }

    public function showAutosEditados($autos)
    {
        require  'templates/encabezadoUsuario.phtml'; 
        require 'templates/tablaAutosMostrar.phtml';
        require  'templates/tablaEditar.phtml';
        require  'templates/footer.phtml';
    }
    public function showAutosEliminados($autos){
        require  'templates/encabezadoUsuario.phtml';
        require 'templates/tablaAutosMostrar.phtml'; 
        require  'templates/tablaEliminar.phtml';
        require  'templates/footer.phtml';
    }
    public function showErrorAgregados()
    {
        require  'templates/encabezadoUsuario.phtml'; 
        echo '<h1 style="text-align: center; color: red;">Error. Por favor, verifica los datos ingresados.</h1>';
        require 'templates/tablaAgregar.phtml';
        require 'templates/footer.phtml';
    }
    public function showErrorEditar() {
        require  'templates/encabezadoUsuario.phtml'; 
        echo '<h1 style="text-align: center; color: red;">Error al editar el auto. Por favor, verifica los datos ingresados.</h1>';
        require  'templates/tablaEditar.phtml'; 
        require  'templates/footer.phtml'; 
    }
    public function showErrorEliminar() {
        require  'templates/encabezadoUsuario.phtml'; 
        echo '<h1 style="text-align: center; color: red;">Error al eliminar el auto. Por favor, verifica los datos ingresados.</h1>';
        require  'templates/tablaEliminar.phtml'; 
        require  'templates/footer.phtml'; 
    }
    public function showLogueado() {
        require  'templates/encabezadoUsuario.phtml'; 
        echo '<h1 style="text-align: center; color: green;">Iniciado sesion correctamente</h1>';
        require  'templates/formularioUsuario.phtml'; 
        require  'templates/footer.phtml'; 
    }
    public function showDErrorDatos() {
        require  'templates/encabezadoUsuario.phtml';  
        echo '<h1 style="text-align: center; color: reed;">Faltan datos</h1>';
        require  'templates/formularioUsuario.phtml'; 
        require  'templates/footer.phtml'; 
    }


}


?>