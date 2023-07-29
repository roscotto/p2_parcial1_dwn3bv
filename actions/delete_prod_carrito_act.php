<?PHP 
require_once '../functions/autoload.php';

$idProducto = $_GET['id'] ?? FALSE;

if($idProducto) {
    (new Carrito())->borrar_producto($idProducto);
    header('Location: ../index.php?sec=carrito');
}