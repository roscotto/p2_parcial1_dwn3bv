<?PHP
require_once '../../functions/autoload.php';

$postData = $_POST;
$idCategoria = $_GET['id'] ?? FALSE;

try {
    $categoria = (new Categoria())->get_x_id($idCategoria);
    $categoria->editar($postData['nombre'], $postData['descripcion'], $postData['f-lanzamiento']);
    header('Location: ../index.php?sec=admin_categorias');
} catch (Exception $e) {
    die("No se pudo editar la categoría.");
}
