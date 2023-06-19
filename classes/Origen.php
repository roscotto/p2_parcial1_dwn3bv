<?PHP


class Origen
{
    private $id;
    private $nombre;
    private $continente;




    /**
     * Devuelve los datos de un país de origen en particular
     * @param int $id El ID del país de origen
     */
    public function get_x_id(int $id): ?Origen
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM origen WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $categoria = $PDOStatement->fetch();

        return $categoria ?? null; //si no lo encuentra, retorna null

    }


    
    /**
     * Método que lista los país de origen de la base de datos
     * @return Origen[] Un array de objetos Origen
     */
    public function listar_origen(): array 
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT DISTINCT origen.id, origen.nombre, origen.continente FROM productos RIGHT JOIN origen ON productos.id = origen.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $listaOrigen = $PDOStatement->fetchAll();

        return $listaOrigen;
    }


    //CRUD

    /**
     * Método que crea / inserta un país en la base de datos
     * @param string $nombre
     * @param string $continente
     */
    public function crear(string $nombre, string $continente)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `origen` (`id`, `nombre`, `continente`) VALUES (NULL, :nombre, :continente)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'continente' => $continente
            ]
        );
        
    }
    

    /**
     * Método que actualiza los datos de una categoría en la base de datos
     * @param string $nombre
     * @param string $continente
     */
    public function editar(string $nombre, string $continente)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `origen` SET nombre = :nombre, continente = :continente WHERE origen.id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'continente' => $continente
            ]
        );
        
    }


    /**
     * Método que elimina instancia de la base de datos
     */
    public function eliminar($id)
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `origen` WHERE `origen`.`id` = ?";

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
     * Get the value of continente
     */
    public function getContinente()
    {
        return $this->continente;
    }
}
