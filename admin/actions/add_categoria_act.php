<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;

//$fileData = $_FILES; //cuando necesitamos recuperar imagenes

// echo "<pre>";
// print_r($postData);
// echo "</pre>";

try {
   (new Categoria())->crear($postData['nombre'], $postData['descripcion'], $postData['f-lanzamiento']);
   //echo "Categoría creada con éxito.";
   header(Location: ../../index.php?sec=tienda)
} catch (\Exception $e) {
    die("No se pudo cargar la categoría.");   
}