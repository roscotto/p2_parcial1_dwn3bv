<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;


try {
   (new Origen())->crear($postData['nombre'], $postData['continente']);
  
   header('Location: ../index.php?sec=admin_origen');
} catch (\Exception $e) {
    die("No se pudo cargar el país.");   
}