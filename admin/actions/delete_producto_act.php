<?PHP 
require_once '../../functions/autoload.php';

$id = $_GET['id'] ?? FALSE;

try {
    $producto = (new Producto())->producto_x_id($id);

    $producto->vaciar_etiquetas();
    $producto->eliminar();

    (new Alerta())->registrar_alerta('success', "El producto" . $producto->getNombre_prod() ." se eliminó correctamente");
    header('Location: ../index.php?sec=admin_productos');
} catch (Exception $e) {
    

    (new Alerta())->registrar_alerta('danger', "El producto no se pudo eliminar correctamente. Por favor, pongase en contacto con el administrador del sistema.");
    header('Location: ../index.php?sec=admin_productos');
}