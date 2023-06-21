<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;
$idEtiqueta = $_GET['id'] ?? FALSE;
$fileData = $_FILES['icono_etiq'] ?? FALSE;

// echo "<pre>";
// echo "<p>POST</p>";
// print_r($postData);
// echo "</pre>";

// echo "<pre>";
// echo "<p>id</p>";
// print_r($idEtiqueta);
// echo "</pre>";

// echo "<pre>";
// echo "<p>file data</p>";
// print_r($fileData);
// echo "</pre>";

try {
    $etiqueta = (new Etiqueta())->get_x_id($idEtiqueta);

    if (!empty($fileData['tmp_name'])) {
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/etiquetas", $fileData);

        (new Imagen())->borrarImagen(__DIR__ . "/../../img/etiquetas/" . $postData['icono-actual']);

    }else{
        $imagen = $postData['icono-actual'];
    }

    $etiqueta->editar($postData['nombre_etiqueta'], $imagen);

    header('Location: ../index.php?sec=admin_etiquetas');

} catch (Exception $e) {
     die("No se pudo editar la etiqueta.");   
 }