<?PHP 
require_once '../../functions/autoload.php';

$idEtiqueta = $_GET['id'] ?? FALSE;

$etiqueta = (new Etiqueta())->get_x_id($idEtiqueta);



try {
    (new Etiqueta())->eliminar($idEtiqueta);
    
    header('Location: ../index.php?sec=admin_etiquetas');
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
     die("No se pudo eliminar la etiqueta.");   
 }