<?PHP

class Compra
{
    private $id;
    private $usuario;
    private $fecha;
    private $importe;
    private $productos;

    private static $createValues = ['id', 'fecha', 'importe'];

    /**
     * Método que lista todas las compras cargadas en la base de datos
     * @return Compra[] Un array de objetos Compra
     */
    public function listar_compras(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT compras.*, 
        GROUP_CONCAT(productos_x_compra.id_producto) AS productos_adquiridos,
        GROUP_CONCAT(productos_x_compra.cantidad) AS cantidades
                FROM compras
                LEFT JOIN productos_x_compra
                ON compras.id = productos_x_compra.id_compra GROUP BY compras.id;";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($result = $PDOStatement->fetch()) {
            $listaCompras[] = $this->crear_compra($result);
        }

        return $listaCompras;
    }

    /**
     * Método que devuelve el precio total de la sumatoria de todas las compras
     * @return float El precio total de todas las compras
     */
    public function precio_total() : float
    {
        $total = 0;
        foreach ($this->listar_compras() as $c) {
            $total += $c->getImporte();
        }
        return $total;
    }


    /**
     * Devuelve un array de compras de un usuario en particular
     * @param int $id_usuario ID del usuario a buscar
     * 
     * @return Compra[] Un array con todos las compras que el usuario realizó.
     */

    public function compras_x_usuario(int $id_usuario): array
    {
        $comprasRealizadas = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT compras.*, 
        GROUP_CONCAT(productos_x_compra.id_producto) AS productos_adquiridos,
        GROUP_CONCAT(productos_x_compra.cantidad) AS cantidades
                FROM compras
                LEFT JOIN productos_x_compra
                ON compras.id = productos_x_compra.id_compra
                WHERE id_usuario = ?
                GROUP BY compras.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(
            [$id_usuario]
        );

        while ($result = $PDOStatement->fetch()) {
            $comprasRealizadas[] = $this->crear_compra($result);
        }

        return $comprasRealizadas;
    }


    /**
     * Crea una instancia del objeto Compra a partir de un array asociativo, configurando sus propiedades
     * @param array $compraData Un array asociativo con los datos de la compra
     * @return Compra Un objeto Compra
     */
    private function crear_compra($compraData): Compra
    {
        $compra = new self();
        //Configuracion de las propiedades del objeto
        //por cada elemento del array asociativo, le asigno el valor a la propiedad correspondiente
        foreach (self::$createValues as $value) {
            $compra->{$value} = $compraData[$value];
        }

        $compra->usuario = (new Usuario())->get_x_id($compraData['id_usuario']);
        


        $productos_ids = !empty($compraData['productos_adquiridos']) ? explode(',', $compraData['productos_adquiridos']) : []; //si no hay productos, asigno un array vacio (para evitar errores)
        
        $productos = [];
        if (!empty($productos_ids)) { //si hay productos, los busco y los asigno
            foreach ($productos_ids as $id) {
                //array de objetos Producto
                $productos[] = (new Producto())->producto_x_id(intval($id));
            }
        }
       

        //array de cantidades
        $cantidades = !empty($compraData['cantidades']) ? explode(',', $compraData['cantidades']) : []; //si no hay cantidade, asigno un array vacio (para evitar errores)

        $productosConCantidades = [];
        foreach ($productos as $key => $producto) {
            $productosConCantidades[] = [
                'producto' => $producto,
                'cantidad' => $cantidades[$key]
            ];
        }
        $compra->productos = $productosConCantidades;
        
        return $compra;
    }


    /**
     * Devuelve los datos de una compra en particular
     * @param int $id EL ID único de la compra a mostrar
     * 
     * @return ?Compra Devuelve un objeto Compra o, si no lo encuentra, null
     */
    public function compra_x_id(int $id): ?Compra
    {

        $conexion = Conexion::getConexion();
        //$query = "SELECT * FROM compras WHERE id = ?";
        $query = "SELECT compras.*,
                GROUP_CONCAT(productos_x_compra.id_producto) AS productos_adquiridos 
                FROM compras 
                LEFT JOIN productos_x_compra ON productos_x_compra.id_compra = compras.id
                WHERE compras.id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(
            [$id]
        );

        $compra = $this->crear_compra($PDOStatement->fetch());

        return $compra ?? null; //si no lo encuentra, retorna null
    }

    
    /**
     * Método que formatea fecha
     * @param string $fecha La fecha a formatear en formato "Y-m-d"
     * @return string La fecha formateada en formato "d-m-Y"
     */
    function formatearFecha($fecha) {
        // Convertir la fecha a un objeto DateTime
        $dateObj = DateTime::createFromFormat('Y-m-d', $fecha);
        
        // Verificar si la fecha es válida
        if (!$dateObj) {
            return "Fecha inválida";
        }
        
        // Formatear la fecha al formato deseado "04-08-2023"
        return $dateObj->format('d-m-Y');
    }















    /**
     * Get the value of id_compra
     */
    public function getId()
    {
        return $this->id;
    }

    
    
    /**
     * Get the value of id_usuario
     */
    public function getId_usuario()
    {
        return $this->usuario->getId();
    }
    
    /**
     * Get the full name of usuario
     */
    public function getUsuario()
    {
        return $this->usuario->getNombre() . " " . $this->usuario->getApellido();
    }
    
    
    
    
    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

 
    
    /**
     * Get the value of productos
     */ 
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Devuelve un array con los IDs de los productos de la compra
     */
    public function getProductosIds(): array
    {
        $arrayProductos = [];
        foreach ($this->productos as $e) {
            $arrayProductos[] = intval($e->getId());
        }

        return $arrayProductos;
    }


    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }
}
