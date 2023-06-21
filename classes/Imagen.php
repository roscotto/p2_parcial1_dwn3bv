<?PHP

class Imagen
{
    private $error;


    /**
     * Método que sube una imagen al servidor
     * @param string $rutaGuardado ruta donde se guardará la imagen
     * @param array $fileData datos de la imagen
     * @return string nombre de la imagen subida
     */
    public function subirImagen($rutaGuardado, $fileData): string
    {

        echo "<pre>";
        print_r($fileData);
        echo "</pre>";

        if (!empty($fileData['tmp_name'])) {
            $imgNombreOriginal = explode(".", $fileData['name']); //separo el nombre de la imagen de su extensión
            $extension = end($imgNombreOriginal); //obtengo la extensión de la imagen

            //fecha en formato unix para darle un nombre único a la imagen
            $imgNombreNuevo = time() . "." . $extension; //concateno la fecha con la extensión de la imagen

            $imagenSubida = move_uploaded_file($fileData['tmp_name'], "$rutaGuardado/$imgNombreNuevo"); //muevo la imagen a la carpeta de imagenes

            if (!$imagenSubida) {
                throw new Exception("No se pudo subir la imagen");
            } else {
                return $imgNombreNuevo;
            }
        }
    }

    /**
     * Método que borra una imagen del servidor
     * @param string $rutaImagen ruta de la imagen a borrar
     * @return bool TRUE si se borró la imagen, FALSE si no se borró
     */
    public function borrarImagen($rutaImagen): bool
    {
        if (file_exists(($rutaImagen))) {

            $imagenBorrada =  unlink($rutaImagen);

            if (!$imagenBorrada) {
                throw new Exception("Error al borrar la imagen");
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }










    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }
}
