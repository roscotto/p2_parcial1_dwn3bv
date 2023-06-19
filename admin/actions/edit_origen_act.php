<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;
$idPaisOrigen = $_GET['id'] ?? FALSE;

try {
    (new Origen())->editar($idPaisOrigen, $postData['nombre'], $postData['continente']);
    header('Location: ../index.php?sec=admin_origen');
 } catch (\Exception $e) {
     die("No se pudo editar el país.");   
 }