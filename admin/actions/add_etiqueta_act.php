<?PHP
require_once '../../functions/autoload.php';

$postData = $_POST;
$fileData = $_FILES['icono_etiq']; //cuando necesitamos recuperar imagenes


try {

    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/etiquetas", $fileData);

    (new Etiqueta())->crear(
        $postData['nombre_etiqueta'],
        $imagen
    );
    header('Location: ../index.php?sec=admin_etiquetas');
} catch (Exception $e) {
    die("No se pudo cargar la etiqueta.");
}
