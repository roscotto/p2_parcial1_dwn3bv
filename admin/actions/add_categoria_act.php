<?PHP 
require_once '../../functions/autoload.php';

$postData = $_POST;





try {
   (new Categoria())->crear($postData['nombre'], $postData['descripcion'], $postData['f-lanzamiento']);
   //echo "Categoría creada con éxito.";
   header('Location: ../index.php?sec=admin_categorias');
} catch (\Exception $e) {
    die("No se pudo cargar la categoría.");   
}