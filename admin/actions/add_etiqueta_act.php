<?PHP
require_once '../../functions/autoload.php';

$postData = $_POST;

$fileData = $_FILES['icono_etiq']; //cuando necesitamos recuperar imagenes

// echo "<pre>";
// print_r($postData);
// echo "</pre>";

try {
    if (!empty($fileData['tmp_name'])) {
        $imgNombreOriginal = explode(".", $fileData['name']); //separo el nombre de la imagen de su extensión
        $extension = end($imgNombreOriginal); //obtengo la extensión de la imagen


        //fecha en formato unix para darle un nombre único a la imagen
        $imgNombreNuevo = time() . "." . $extension; //concateno la fecha con la extensión de la imagen


        $imagenSubida = move_uploaded_file($fileData['tmp_name'], "../../img/etiquetas/" . $imgNombreNuevo); //muevo la imagen a la carpeta de imagenes

        if (!$imagenSubida) {
            die("<p>No se pudo subir la imagen.</p>");
        } else {
            (new Etiqueta())->crear($postData['nombre_etiqueta'], $imgNombreNuevo);
            header('Location: ../index.php?sec=admin_etiquetas');
        }


        echo "<pre>";
        print_r($extension);
        echo "</pre>";
    } else {
        echo "<p>La imagen [$imagenSubida] no pudo subirse.</p>";
        echo "<pre>";
        print_r($fileData['error']);
        echo "</pre>";
    }
} catch (\Exception $e) {
    die("No se pudo cargar la etiqueta.");
}
