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
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM categoria WHERE id = $id";

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