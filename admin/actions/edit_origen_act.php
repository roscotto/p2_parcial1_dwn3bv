<?PHP
require_once '../../functions/autoload.php';

$postData = $_POST;
$idPaisOrigen = $_GET['id'] ?? FALSE;

try {
    $origen = (new Origen())->get_x_id($idPaisOrigen);
    $origen->editar($postData['nombre'], $postData['continente']);
    header('Location: ../index.php?sec=admin_origen');
} catch (Exception $e) {
    die("No se pudo editar el país.");
}
