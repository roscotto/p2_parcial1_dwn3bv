<?PHP 
require_once '../functions/autoload.php';

$palabraBusqueda = $_GET['q'];

$resultadosBusqueda = (new Producto())->buscador($palabraBusqueda);


try {
    (new Producto())->buscador($palabraBusqueda);
    header('Location: ../index.php?sec=resultado_busqueda&q=' . $palabraBusqueda );
 } catch (\Exception $e) {
     die("No existen resultados para la búsqueda.");    
 }

