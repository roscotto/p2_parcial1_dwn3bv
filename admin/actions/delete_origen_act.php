<?PHP 
require_once '../../functions/autoload.php';

$idPaisOrigen = $_GET['id'] ?? FALSE;


try {
     $origen = (new Origen())->get_x_id($idPaisOrigen);
     $origen->eliminar($idPaisOrigen);
    
    header('Location: ../index.php?sec=admin_origen');
 } catch (\Exception $e) {
    //bloque con detalle de error
     die("No se pudo eliminar el país.");   
 }