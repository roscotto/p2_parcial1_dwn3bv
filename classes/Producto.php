<?PHP 
//defino la clase Producto
class Producto 
{
    //propiedades que necesita la clase para funcionar
    public int $id;
    public string $filtro_por_categoria;
    public string $categoria;
    public string $nombre_producto;
    public string $descripcion;
    public string $imagen;
    public string $alt;
    public string $origen;
    public string $material;
    public string $medidas;
    public string $peso;
    public string $cuidado;
    public int $stock;
    public int $precio;

    
    /**
     * Devuelve el catálogo completo
     * 
     * @return array Un array de objetos clase Producto.
     */
    public function catalogo_completo(): array {
        $catalogo = []; //creo un array vacio

        $catalogoJSON = file_get_contents('datos/productos.json');   //tomo el JSON y lo guardo en una variable
        $JSONData = json_decode($catalogoJSON); //decodifico el JSON y lo guardo en una variable - contiene un array de objetos

        //recorro el array de objetos y voy creando instancias de la clase Producto
        foreach ($JSONData as $cadaProducto) {

            $producto = new self(); //creo una nueva instancia de la clase donde estoy

            //asigno los valores que tomo del JSONData a las propiedades de la instancia
            $producto->id = $cadaProducto->id;
            $producto->filtro_por_categoria = $cadaProducto->filtro_por_categoria;
            $producto->categoria = $cadaProducto->categoria;
            $producto->nombre_producto = $cadaProducto->nombre_producto;
            $producto->descripcion = $cadaProducto->descripcion;
            $producto->imagen = $cadaProducto->imagen;
            $producto->alt = $cadaProducto->alt;
            $producto->origen = $cadaProducto->origen;
            $producto->material = $cadaProducto->material;
            $producto->medidas = $cadaProducto->medidas;
            $producto->peso = $cadaProducto->peso;
            $producto->cuidado = $cadaProducto->cuidado;
            $producto->stock = $cadaProducto->stock;
            $producto->precio = $cadaProducto->precio;

            $catalogo[] = $producto; //guardo la instancia en el array
        }

        return $catalogo; //retorno el array con todas las instancias
    }


    /**
    * Devuelve el catálogo de productos de una categoria en particular
    * @param string $categoria Un string con el nombre de la categoria a buscar
    * 
    * @return array Un array con todos los productos de la categoria en stock.
    */

    function catalogo_x_categoria(string $categoria): array
    {
        $resultado = [];

        //llamo al catalogo completo
        $catalogo = $this->catalogo_completo();

        //recorro catalogo y me quedo con los productos
        foreach ($catalogo as $p) {
            if($p->filtro_por_categoria == $categoria) {
                $resultado[] = $p; //versión reducida del push
            }

        }

        return $resultado;
    }


}

