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
     * @return array
     */
    public function listar_categorias(): array 
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT DISTINCT categoria.id, categoria.nombre FROM productos JOIN categoria ON productos.id = categoria.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $listaCategorias = $PDOStatement->fetchAll();

        return $listaCategorias;
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
