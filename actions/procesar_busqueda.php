<?PHP 
require_once '../classes/Producto.php';

$palabraBusqueda = $_GET['q'];

$resultadosBusqueda = (new Producto())->buscador($palabraBusqueda);


