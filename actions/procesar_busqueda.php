<?PHP 
require_once '../functions/autoload.php';

$palabraBusqueda = $_GET['q'];

$resultadosBusqueda = (new Producto())->buscador($palabraBusqueda);


if ($resultadosBusqueda){
    (new Producto())->buscador($palabraBusqueda);
    header('Location: ../index.php?sec=resultado_busqueda&q=' . $palabraBusqueda );
}else{
    (new Alerta())->registrar_alerta('error', "No pudimos encontar tu producto.");
    header('Location: ../index.php?sec=resultado_busqueda');
}

