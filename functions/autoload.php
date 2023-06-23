<?PHP 
session_start();

/**
 * Realiza una carga automática de las clases que necesita el proyecto
 * @param string $nombreClase El nombre de la clase a cargar
 */
function autoloadClasses($nombreClase) {
    $archivoClase = __DIR__ . '/../classes/' . $nombreClase . '.php'; // __DIR__ es una constante que devuelve la ruta absoluta

    if (file_exists($archivoClase)){
        require_once($archivoClase);
    } else {
        die("El archivo de la clase $nombreClase no existe");
    }
    
}

spl_autoload_register('autoloadClasses'); //registra la función autoloadClasses() como el método de carga de clases por defecto