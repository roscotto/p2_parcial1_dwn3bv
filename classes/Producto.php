<?PHP
//defino la clase Producto
class Producto
{
    //propiedades que necesita la clase para funcionar
    private $id;
    private $nombre_prod;
    private $categoria;
    private $imagen;
    private $alt;
    private $descripcion;
    private $origen;
    private $material;
    private $medidas;
    private $peso;
    private $cuidado;
    private $stock;
    private $etiquetas;
    private $precio;
    private $inicio_promocion;
    private $fin_promocion;

    private static $createValues = ['id', 'nombre_prod', 'imagen', 'alt', 'descripcion', 'material', 'medidas', 'peso', 'cuidado', 'stock', 'precio', 'inicio_promocion', 'fin_promocion'];




    //CRUD

    /**
     * Inserta un nuevo producto en la base de datos
     * @param string $nombre_prod 
     * @param int $categoria
     * @param string $imagen la ruta a un archivo .jpg o .png
     * @param string $alt
     * @param string $descripcion
     * @param int $origen
     * @param string $material
     * @param string $medidas
     * @param string $peso
     * @param string $cuidado
     * @param int $stock
     * @param float $precio
     * @param string $inicio_promocion en formato YYYY-MM-DD HH:MM:SS (timestamp)
     * @param string $fin_promocion en formato YYYY-MM-DD HH:MM:SS (timestamp)
     * @return bool true si se creó correctamente, false si no.
     */
    public function crear($nombre_prod, $categoria, $imagen, $alt, $descripcion, $origen, $material, $medidas, $peso, $cuidado, $stock, $precio, $inicio_promocion, $fin_promocion): int
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `productos` VALUES (NULL, :nombre_prod, :categoria, :imagen, :alt, :descripcion, :origen, :material, :medidas, :peso, :cuidado, :stock, :precio, :inicio_promocion, :fin_promocion)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre_prod' => $nombre_prod,
                'categoria' => $categoria,
                'imagen' => $imagen,
                'alt' => $alt,
                'descripcion' => $descripcion,
                'origen' => $origen,
                'material' => $material,
                'medidas' => $medidas,
                'peso' => $peso,
                'cuidado' => $cuidado,
                'stock' => $stock,
                'precio' => $precio,
                'inicio_promocion' => $inicio_promocion,
                'fin_promocion' => $fin_promocion
            ]
        );

        return $conexion->lastInsertId(); //devuelve el id del ultimo registro insertado
    }



    /**
     * Crea una relacion entre un producto y una etiqueta
     * @param int $producto_id
     * @param int $etiqueta_id
     */
    public function add_etiquetas_relacion(int $producto_id, int $etiqueta_id)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO etiquetas_x_producto VALUES (NULL, :producto_id, :etiqueta_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'producto_id' => $producto_id,
                'etiqueta_id' => $etiqueta_id
            ]
        );
    }

    /**
     * Método que vacía la lista de etiquetas de un producto
     * @param int $producto_id
     *
     */
    public function vaciar_etiquetas()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM etiquetas_x_producto WHERE producto_id = :producto_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'producto_id' => $this->id
            ]
        );
    }

    /**
     * Actualiza un producto en la base de datos
     * * @param string $nombre_prod 
     * @param int $categoria
     * @param string $imagen la ruta a un archivo .jpg o .png
     * @param string $alt
     * @param string $descripcion
     * @param int $origen
     * @param string $material
     * @param string $medidas
     * @param string $peso
     * @param string $cuidado
     * @param int $stock
     * @param float $precio
     * @param string $inicio_promocion en formato YYYY-MM-DD HH:MM:SS (timestamp)
     * @param string $fin_promocion en formato YYYY-MM-DD HH:MM:SS (timestamp)
     * @return bool true si se creó correctamente, false si no.
     */
    public function editar($nombre_prod, $categoria, $imagen, $alt, $descripcion, $origen, $material, $medidas, $peso, $cuidado, $stock, $precio, $inicio_promocion, $fin_promocion)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `productos` SET
         nombre_prod = :nombre_prod,
         categoria = :categoria,
         imagen =:imagen,
         alt = :alt,
         descripcion = :descripcion,
         origen = :origen,
         material = :material,
         medidas = :medidas,
         peso = :peso,
         cuidado = :cuidado, 
         stock = :stock, 
         precio = :precio, 
         inicio_promocion = :inicio_promocion, 
         fin_promocion = :fin_promocion
         WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre_prod' => $nombre_prod,
                'categoria' => $categoria,
                'imagen' => $imagen,
                'alt' => $alt,
                'descripcion' => $descripcion,
                'origen' => $origen,
                'material' => $material,
                'medidas' => $medidas,
                'peso' => $peso,
                'cuidado' => $cuidado,
                'stock' => $stock,
                'precio' => $precio,
                'inicio_promocion' => $inicio_promocion,
                'fin_promocion' => $fin_promocion,
                'id' => $this->id
            ]
        );
    }



    /**
     * Elimina un producto de la base de datos
     *
     */
    public function eliminar()
    {

        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `productos` WHERE id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [$this->id]
        );
    }



    /**
     * Devuelve el catálogo completo
     * 
     * @return array Un array de objetos clase Producto.
     */
    public function catalogo_completo(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        //$query = "SELECT * FROM productos";
        $query = "SELECT productos.*, GROUP_CONCAT(etiquetas_x_producto.etiqueta_id) AS etiquetas
                  FROM `productos` 
                  LEFT JOIN etiquetas_x_producto ON productos.id = etiquetas_x_producto.producto_id
                  GROUP BY productos.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(); //ejecuto la query

        //$catalogo = $PDOStatement->fetchAll(); //guardo el resultado en un array
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->crear_producto($result);
        }

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

    public function catalogo_x_categoria(int $categoria): array
    {
        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE categoria = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(
            [$categoria]
        );

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->crear_producto($result);
        }

        return $catalogo;
    }

    /**
     * Crea una instancia del objeto Producto a partir de un array asociativo, configurando sus propiedades
     * @param array $productoData Un array asociativo con los datos del producto
     * @return Producto Un objeto Producto
     */
    private function crear_producto($productoData): Producto
    {
        $producto = new self();
        //Configuracion de las propiedades del objeto
        //por cada elemento del array asociativo, le asigno el valor a la propiedad correspondiente
        foreach (self::$createValues as $value) {
            $producto->{$value} = $productoData[$value];
        }

        $producto->categoria = (new Categoria())->get_x_id($productoData['categoria']);
        $producto->origen = (new Origen())->get_x_id($productoData['origen']);


        $etiquetas_ids = !empty($productoData['etiquetas']) ? explode(',', $productoData['etiquetas']) : []; //si no hay etiquetas, asigno un array vacio (para evitar errores)
        $etiquetas = [];

        if (!empty($etiquetas_ids)) { //si hay etiquetas, las busco y las asigno
            foreach ($etiquetas_ids as $id) {
                $etiquetas[] = (new Etiqueta())->get_x_id(intval($id));
            }
        }

        $producto->etiquetas = $etiquetas;



        return $producto;
    }


    /**
     * Devuelve los datos de un producto en particular
     * @param int $id EL ID único del producto a mostrar
     * 
     * @return ?Producto Devuelve un objeto Producto o, si no lo encuentra, null
     */
    public function producto_x_id(int $id): ?Producto
    {

        $conexion = Conexion::getConexion();
        //$query = "SELECT * FROM productos WHERE id = ?";
        $query = "SELECT productos.*,
                GROUP_CONCAT(etiquetas_x_producto.etiqueta_id) AS etiquetas 
                FROM productos 
                LEFT JOIN etiquetas_x_producto ON etiquetas_x_producto.producto_id = productos.id
                WHERE productos.id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(
            [$id]
        );

        $producto = $this->crear_producto($PDOStatement->fetch());

        return $producto ?? null; //si no lo encuentra, retorna null
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
            if ($p->precio <= $precio) {
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

        if (count($arrayPalabras) <= $cantidad) { //si la cantidad de palabras es menor o igual a la cantidad solicitada, retorno el texto completo
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
        $inicio_f = date('Y-m-d H:i:s', strtotime($this->inicio_promocion));
        $fin_f    = date('Y-m-d H:i:s', strtotime($this->fin_promocion));

        if ($this->inicio_promocion != "" && $this->fin_promocion != "") {
            if ($fecha_actual >= $inicio_f && $fecha_actual <= $fin_f) {
                $cadena = "
                    <p><strong>ESTE PRODUCTO ESTA EN PROMOCIÓN</strong></p>
                ";
            }
        }
        return $cadena;
    }



    /**
     * Método buscador de productos por string en el nombre del producto y en la descripción
     * @param string $palabraBusqueda Un string con la búsqueda del usuario
     *  
     * @return Producto[] Un array con todos los productos que coincidan con la búsqueda.
     */

    public function buscador(string $palabraBusqueda): array
    {
        $catalogo = [];
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM `productos` WHERE nombre_prod LIKE :palabraBusqueda;";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute(
                [
                    'palabraBusqueda' => "%$palabraBusqueda%"
                ]
            );

            while ($result = $PDOStatement->fetch()) {
                $catalogo[] = $this->crear_producto($result);
            }

        
        } catch (\Throwable $th) {
            $catalogo = [];
        }

        return $catalogo;
        
    }
























    /* GETTERS */

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {

        return $this->categoria->getNombre();
    }

    /**
     * Get ID the value of categoria
     */
    public function getIdCategoria()
    {

        return $this->categoria->getId();
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
    public function getOrigen()
    {


        return $this->origen->getNombre();
    }

    /**
     * Get ID the value of origen
     */
    public function getIdOrigen()
    {
        return $this->origen->getId();
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
     * Get the value of etiquetas
     */
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }

    /**
     * Devuelve un array con los IDs de las etiquetas
     */
    public function getEtiquetasIds(): array
    {
        $arrayEtiquetas = [];
        foreach ($this->etiquetas as $e) {
            $arrayEtiquetas[] = intval($e->getId());
        }

        return $arrayEtiquetas;
    }




}
