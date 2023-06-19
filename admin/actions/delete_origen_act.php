<?PHP 
require_once '../../functions/autoload.php';

$idPaisOrigen = $_GET['id'] ?? FALSE;


try {
     $origen = (new Origen())->get_x_id($idPaisOrigen);
     $origen->eliminar($idPaisOrigen);
    
    header('Location: ../index.php?sec=admin_origen');
 } catch (\Exception $e) {
    //bloque con detalle de error
            // echo "<pre>";
            // print_r($e);
            // echo "</pre>";
            // echo "<p>El error se generó en el siguiente archivo:</p>";
            // echo $e->getFile();
            // echo "<p>El error se generó en la siguiente línea:</p>";
            // echo $e->getLine();
            // echo "<p>El error es el siguiente:</p>";
            // echo $e->getMessage();
     die("No se pudo eliminar el país.");   
 }