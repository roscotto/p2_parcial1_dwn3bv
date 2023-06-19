<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;

//$fileData = $_FILES; //cuando necesitamos recuperar imagenes

echo "<pre>";
print_r($postData);
echo "</pre>";
echo "<pre>";
print_r($fileData);
echo "</pre>";

try {
   (new Etiqueta())->crear($postData['nombre_etiqueta']);
   header('Location: ../index.php?sec=admin_etiquetas');
} catch (\Exception $e) {
    die("No se pudo cargar la etiqueta.");   
}