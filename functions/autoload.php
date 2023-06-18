<?PHP 

function autoloadClasses($nombreClase) {
    $archivoClase = __DIR__ . '/../classes/' . $nombreClase . '.php'; // __DIR__ es una constante que devuelve la ruta absoluta

    if (file_exists($archivoClase)){
        require_once($archivoClase);
    } else {
        die("El archivo de la clase $nombreClase no existe");
    }
    
}


spl_autoload_register('autoloadClasses');