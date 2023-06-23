<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;
$fileData = $_FILES['imagen'];


echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_FILES);
echo "</pre>";


try {
    $producto = (new Producto());
    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/productos", $fileData);

    $idProducto = $producto->crear(
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
      
    //var_dump($idProducto);
     
    if(isset($postData['etiquetas'])){
         foreach ($postData['etiquetas'] as $etiqueta) {
             $producto->add_etiquetas_relacion($idProducto, $etiqueta);
         }
    }

    (new Alerta())->registrar_alerta('success', "El producto <strong>".$postData['nombre']."</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_productos');

} catch (Exception $e) {
    (new Alerta())->registrar_alerta('error', "No se pudo cargar el producto.");
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar el producto.");   
    header('Location: ../index.php?sec=admin_productos');
}