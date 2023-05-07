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
    public string $imagen_2;
    public string $imagen_3;
    public string $alt;
    public string $origen;
    public string $material;
    public string $medidas;
    public string $peso;
    public string $cuidado;
    public int $stock;
    public int $precio;
    public string $inicio_promocion;
    public string $fin_promocion; 
    
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
            $producto->imagen_2 = $cadaProducto->imagen_2;
            $producto->imagen_3 = $cadaProducto->imagen_3;
            $producto->alt = $cadaProducto->alt;
            $producto->origen = $cadaProducto->origen;
            $producto->material = $cadaProducto->material;
            $producto->medidas = $cadaProducto->medidas;
            $producto->peso = $cadaProducto->peso;
            $producto->cuidado = $cadaProducto->cuidado;
            $producto->stock = $cadaProducto->stock;
            $producto->precio = $cadaProducto->precio;
            $producto->inicio_promocion = $cadaProducto->inicio_promocion;        
            $producto->fin_promocion = $cadaProducto->fin_promocion;
            $catalogo[] = $producto; //guardo la instancia en el array
        }

        return $catalogo; //retorno el array con todas las instancias
    }


    /**
    * Devuelve el catálogo de productos de una categoria en particular
    * @param string $categoria Un string con el nombre de la categoria a buscar
    * 
    * @return Producto[] Un array con todos los productos de la categoria en stock.
    */

    public function catalogo_x_categoria(string $categoria): array
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


    /**
    * Devuelve los datos de un producto en particular
    * @param int $id EL ID único del producto a mostrar
    * 
    * @return ?Producto Devuelve un objeto Producto o, si no lo encuentra, null
     */
    public function producto_x_id(int $id): ?Producto 
    {

        $catalogo = $this->catalogo_completo();

        foreach ($catalogo as $p) {
            if ($p->id == $id) {
                return $p; //como va a encontrar uno solo, que retorne ese.
            }
        }

        return null; // si no lo encuentra, retorna null
    }


    /**
    * Devuelve el catálogo de productos con un precio menor al valor determinado
    * @param float $precio Un numero con el precio máximo a filtrar
    * 
    * @return Producto[] Un array de objetos Producto dentro del rango de precio.
    */
    public function catalogo_precio_menor_a(float $precio): array 
    {
            
            $resultado = [];
    
            //llamo al catalogo completo
            $catalogo = $this->catalogo_completo();
    
            //recorro catalogo y me quedo con los productos
            foreach ($catalogo as $p) {
                if($p->precio <= $precio) {
                    $resultado[] = $p; //versión reducida del push
                }
    
            }
    
            return $resultado;
    }


    /** 
    * Devuelve las primeras X palabras de un párrafo.
    * @param string $texto Este es el párrafo a reducir.
    * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional, si no se provee se asumirá 15).
    * 
    * @return string La cantidad de palabras solicitada con un elipsis(...) concatenado al final. 
    */
    public function recortar_palabras(int $cantidad = 15): string
    {
        $texto = $this->descripcion; //tomo el texto de la propiedad descripcion

        $arrayPalabras = explode(' ', $texto); //convierto el string en un array de palabras, separandolas siempre que haya un espacio

        if(count($arrayPalabras) <= $cantidad) { //si la cantidad de palabras es menor o igual a la cantidad solicitada, retorno el texto completo
            $resultado = $texto; 
        } else {
            array_splice($arrayPalabras, $cantidad); //si la cantidad de palabras es mayor a la solicitada, corto el array en la cantidad solicitada
            $texto = implode(' ', $arrayPalabras); //vuelvo a convertir el array en un string, separando las palabras con un espacio
            $resultado = $texto . '...'; //retorno el texto con un elipsis al final
        }
        return $resultado;
    }


    /**
     * Devuelve el precio formateado con el signo $ y separador de miles
     */
    public function precio_formateado(): string
    {
        $precio = $this->precio; //tomo el precio de la propiedad precio

        $resultado = '$' . number_format($precio, 2, ',', '.'); //formateo el precio con el signo $ y separador de miles

        return $resultado;
    }
}

