<?PHP 
require_once '../functions/autoload.php';

$productosCarrito = (new Carrito())->listar_productos();

echo "<pre>";
print_r($productosCarrito);
echo "</pre>";


try {
 
} catch (Exception $e) {
   (new Alerta())->registrar_alerta('danger', "No se pudo finalizar la compra debido a un error.");
   header('Location: ../index.php?sec=panel_usuario');
}