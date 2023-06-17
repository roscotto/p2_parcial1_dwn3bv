<?PHP 
//defino la clase Producto
class Producto 
{
    //propiedades que necesita la clase para funcionar
    private $id;
    //private string $filtro_por_categoria;
    private $nombre_prod;
    private $categoria_id;
    private $imagen;
    private $alt;
    private $descripcion;
    private $origen_id;
    private $material;
    private $medidas;
    private $peso;
    private $cuidado;
    private $stock;
    private $precio;
    private $etiqueta_id;
    private $inicio_promocion;
    private $fin_promocion; 
    
    /**
     * Devuelve el catálogo completo
     * 
     * @return array Un array de objetos clase Producto.
     */
    public function catalogo_completo(): array {
   
        $conexion = (new Conexion())->getConexion(); //instancio la conexion para acceder al método getConexion
        $query = "SELECT * FROM productos";
    
        $PDOStatement = $conexion->prepare($query); 
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(); //ejecuto la query

        $catalogo = $PDOStatement->fetchAll(); //guardo el resultado en un array

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo; 
    }


    /**
    * Devuelve el catálogo de productos de una categoria en particular
    * @param string $categoria Un string con el nombre de la categoria a buscar
    * 
    * @return Producto[] Un array con todos los productos de la categoria en stock.
    */

    public function catalogo_x_categoria(int $categoria_id): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM productos WHERE categoria_id = $categoria_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
 
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

    //$hoy = date("Ymd");           // 20010310
    //$hoy = date("Y-m-d H:i:s");   // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
    public function en_promocion(): string
    {
        $cadena = "";
        $fecha_actual = date('Y-m-d H:i:s');
        $inicio_f = date($this->inicio_promocion);
        $fin_f    = date($this->fin_promocion);

        if ($this->inicio_promocion != "" && $this->fin_promocion != ""){
            if ($fecha_actual >= $inicio_f && $fecha_actual <= $fin_f){
                $cadena = "
                    <p><strong>ESTE PRODUCTO ESTA EN PROMOCIÓN</strong></p>
                ";
            } 
            
        }
        return $cadena;
    }

    /* GETTERS */

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    // /**
    //  * Get the value of filtro_por_categoria
    //  */ 
    // public function getFiltro_por_categoria()
    // {
    //     return $this->filtro_por_categoria;
    // }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Get the value of nombre_producto
     */ 
    public function getNombre_prod()
    {
        return $this->nombre_prod;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    
    /**
     * Get the value of alt
     */ 
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Get the value of origen
     */ 
    public function getOrigen_id()
    {
        return $this->origen_id;
    }

    /**
     * Get the value of material
     */ 
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Get the value of medidas
     */ 
    public function getMedidas()
    {
        return $this->medidas;
    }

    /**
     * Get the value of peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Get the value of cuidado
     */ 
    public function getCuidado()
    {
        return $this->cuidado;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of inicio_promocion
     */ 
    public function getInicio_promocion()
    {
        return $this->inicio_promocion;
    }

    /**
     * Get the value of fin_promocion
     */ 
    public function getFin_promocion()
    {
        return $this->fin_promocion;
    }

    /**
     * Get the value of etiqueta_id
     */ 
    public function getEtiqueta_id()
    {
        return $this->etiqueta_id;
    }
}

