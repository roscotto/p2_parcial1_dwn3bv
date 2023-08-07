<?PHP 
require_once '../../functions/autoload.php';

$idEtiqueta = $_GET['id'] ?? FALSE;



try {
    $etiqueta = (new Etiqueta())->get_x_id($idEtiqueta);
    $etiqueta->eliminar($idEtiqueta);
    
    header('Location: ../index.php?sec=admin_etiquetas');
 } catch (\Exception $e) {
    //bloque con detalle de error
     die("No se pudo eliminar la etiqueta.");   
 }