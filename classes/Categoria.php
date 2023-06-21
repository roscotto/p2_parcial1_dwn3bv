<?PHP


class Categoria
{
    private $id;
    private $nombre;
    private $descripcion;
    private $fecha_lanzamiento;



    /**
     * Devuelve los datos de una categoría en particular
     * @param int $id El ID de la categoría
     */
    public function get_x_id(int $id): ?Categoria
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categoria WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $categoria = $PDOStatement->fetch();

        return $categoria ?? null; //si no lo encuentra, retorna null

    }


    /**
     * Método que lista las categorías de la base de datos
     * @return Categoria[] Un array de objetos Categoria
     */
    public function listar_categorias(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT DISTINCT categoria.id, categoria.nombre, categoria.descripcion, categoria.fecha_lanzamiento FROM productos RIGHT JOIN categoria ON productos.id = categoria.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $listaCategorias = $PDOStatement->fetchAll();

        return $listaCategorias;
    }


    //CRUD

    /**
     * Método que crea / inserta una categoría en la base de datos
     * @param string $nombre
     * @param string $descripcion
     * @param int $fecha_lanzamiento en formato YYYY-MM-DD HH:MM:SS (timestamp)
     * @return bool
     */
    public function crear(string $nombre, string $descripcion, string $fecha_lanzamiento)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `fecha_lanzamiento`) VALUES (NULL, :nombre, :descripcion, :fecha_lanzamiento)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'fecha_lanzamiento' => $fecha_lanzamiento
            ]
        );
    }

    
    /**
     * Método que actualiza los datos de una categoría en la base de datos
     * @param string $nombre
     * @param string $descripcion
     * @param int $fecha_lanzamiento en formato YYYY-MM-DD HH:MM:SS (timestamp)
     */
    public function editar(string $nombre, string $descripcion, string $fecha_lanzamiento)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `categoria` SET nombre = :nombre, descripcion = :descripcion, fecha_lanzamiento = :fecha_lanzamiento WHERE categoria.id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'fecha_lanzamiento' => $fecha_lanzamiento
            ]
        );
    }

    /**
     * Método que elimina instancia de la base de datos
     */
    public function eliminar($id)
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `categoria` WHERE `categoria`.`id` = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                $id
            ]
        );
    }





    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of fecha_lanzamiento
     */
    public function getFecha_lanzamiento()
    {
        return $this->fecha_lanzamiento;
    }
}
