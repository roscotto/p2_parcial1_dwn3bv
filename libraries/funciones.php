<?PHP

/** 
 * Esta función devuelve las primeras X palabras de un párrafo.
 * @param string $texto Este es el párrafo a reducir.
 * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional, si no se provee se asumirá 15).
 * 
 * @return string La cantidad de palabras solicitada con un elipsis(...) concatenado al final. 
 */
function recortar_palabras(string $texto, int $cantidad = 15): string
{

    //toma un texto y lo recorta a cierta cantidad de palabras.
    $array = explode(" ", $texto); //lo separo siempre que encuentre un espacio. guardamos las piezas                         resultantes en un array - convierte string en array
    if (count($array) <= $cantidad) { //cuenta la cantidad de palabras en array y verifica si es < cantidad 
        $resultado = $texto;
    } else {
        array_splice($array, $cantidad); //elimina una porcion del array y la reemplaza por otra cosa
        $resultado = implode(" ", $array) . "..."; // convierte array en string, pegamos las piezas en resultado
    };

    return $resultado;
};




