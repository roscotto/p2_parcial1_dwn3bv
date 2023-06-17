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
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM origen WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $categoria = $PDOStatement->fetch();

        return $categoria ?? null; //si no lo encuentra, retorna null

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