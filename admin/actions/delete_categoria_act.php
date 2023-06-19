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
            // echo "<pre>";
            // print_r($e);
            // echo "</pre>";
            // echo "<p>El error se generó en el siguiente archivo:</p>";
            // echo $e->getFile();
            // echo "<p>El error se generó en la siguiente línea:</p>";
            // echo $e->getLine();
            // echo "<p>El error es el siguiente:</p>";
            // echo $e->getMessage();
     die("No se pudo eliminar la categoría.");   
 }