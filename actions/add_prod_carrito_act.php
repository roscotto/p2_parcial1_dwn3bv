<?PHP 
require_once '../functions/autoload.php';

$id = $_GET['id'] ?? FALSE;
$cantidad = $_GET['cantidad'] ?? 1;

// echo "<pre>";
// print_r($id);
// echo "</pre>";

// echo "<pre>";
// print_r($cantidad);
// echo "</pre>";

if ($id) {
    (new Carrito())->agregar_producto($id, $cantidad);
    header('Location: ../index.php?sec=carrito');
}