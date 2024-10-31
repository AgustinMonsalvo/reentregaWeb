
<?php
require_once 'controlador/controlador.php';
require_once 'controlador/controladorUsuario.php';
require_once 'libreria/respuesta.php';
require_once 'middlewares/permisos.php';
require_once 'middlewares/VerificacionSesion.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');



 $respuesta= new Response();
$action = 'listar'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
$atributo = $_POST['atributo'] ?? null;
$valor = $_POST['valor'] ?? null;

$params = explode('/', $action);


switch ($params[0]) {
    case 'listar':
        
        $controller = new TaskController();
        $controller->showTasks();
        break;
        case 'detalle':
            $controller = new TaskController();
            $controller->showDetalles($params[1]);
            break;
            case 'buscar':
                $controller = new TaskController();
                $controller->Buscarcatalogos($atributo,$valor); 
                break;
                case 'MostrarLogin':
              
                    $controller = new AuthController();
                    $controller->showLogin();
                    break;
                    case 'login':
                        $controller = new AuthController();
                        $controller->login();
                break;
                case 'logout':
                    $controller = new AuthController();
                    $controller->logout();
            break;
            
                case 'FormularioAgregar':
                    fucionAutenticacion($respuesta);
            fucionPermisos($respuesta);
                    $controller = new AuthController();
                    $controller->MostrarForm(); 
            
                   
                break;
                case 'agregar':
                    $controller = new AuthController();
                    $controller->agregarAutos();
                    break;
                    case 'formularioEditar':
                        fucionAutenticacion($respuesta);
                        fucionPermisos($respuesta);
                        $controller = new AuthController();
                        $controller->MostrarFormEdit();
                        break;
                        case 'editar':
                            $controller = new AuthController();
                            $controller-> FormEdit();
                            break;
                            case 'formularioEliminar':
                                fucionAutenticacion($respuesta);
                                fucionPermisos($respuesta);
                                $controller = new AuthController();
                                $controller-> FormularioEliminarAutos();
                                break;
                                case 'eliminar':
                                    $controller = new AuthController();
                                    $controller-> eliminarAutos();
                                    break;
                   
               
                         default: 
                             echo "404 Page Not Found"; 
                            break;
}