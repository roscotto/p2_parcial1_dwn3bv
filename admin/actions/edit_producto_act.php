<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;
$idProducto = $_GET['id'] ?? FALSE;
$fileData = $_FILES['imagen'] ?? FALSE;

$postData[] = $fileData;

try {
    $producto = (new Producto())->producto_x_id($idProducto);

    if(!empty($fileData['tmp_name'])){
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/productos", $fileData);

        
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/productos/" . $postData['imagen_actual']);
    }else{ 
        $imagen = $postData['imagen_actual'];
    }

    $producto->editar(
        $postData['nombre_prod'],
        $postData['categoria_id'],
        $imagen,
        $postData['alt'],
        $postData['descripcion'],
        $postData['origen_id'],
        $postData['material'],
        $postData['medidas'],
        $postData['peso'],
        $postData['cuidado'],
        $postData['stock'],
        $postData['precio'],
        $postData['inicio_promocion'],
        $postData['fin_promocion'],
        );
        header('Location: ../index.php?sec=admin_productos');

        (new Alerta())->registrar_alerta('success', "El producto <strong>".$postData['nombre']."</strong> se editó correctamente");

} catch (Exception $e) {
    die("No se pudo editar el producto.");
}