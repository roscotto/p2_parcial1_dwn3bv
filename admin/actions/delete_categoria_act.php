<?PHP 
require_once '../../functions/autoload.php';

$idCategoria = $_GET['id'] ?? FALSE;

$categoria = (new Categoria())->get_x_id($idCategoria);



try {
    (new Categoria())->eliminar($idCategoria);
    //echo "Categoría eliminada con éxito.";
    header('Location: ../index.php?sec=admin_categorias');
 } catch (\Exception $e) {
    //bloque con detalle de error
     die("No se pudo eliminar la categoría.");   
 }