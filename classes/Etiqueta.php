<?PHP

class Etiqueta
{
    private $id;
    private $nombre_etiqueta;
    private $icono_etiq;


    /**
     * Devuelve los datos de una etiqueta en particular
     * @param int $id El ID de la etiqueta
     * @return ?Etiqueta El objeto Etiqueta o null si no lo encuentra
     */
    public function get_x_id(int $id): ?Etiqueta
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM etiquetas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $etiqueta = $PDOStatement->fetch();

        return $etiqueta ?? null; //si no lo encuentra, retorna null
    }


    /**
     * Método que lista las etiquetas de la base de datos
     * @return Etiqueta[] Un array de objetos Etiqueta
     */
    public function listar_etiquetas(): array 
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM etiquetas;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $listaEtiquetas = $PDOStatement->fetchAll();

        return $listaEtiquetas;
    }


    //CRUD

    /**
     * Método que crea / inserta una etiqueta en la base de datos
     * @param string $nombre_etiqueta
     */
    public function crear(string $nombre_etiqueta)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `etiquetas` (`id`, `nombre_etiqueta`) VALUES (NULL, :nombre_etiqueta)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre_etiqueta' => $nombre_etiqueta,
            ]
        );
        
    }
    

    /**
     * Método que actualiza los datos de una etiqueta en la base de datos
     * @param string $nombre_etiqueta
     * @param string $icono_etiq
     */
    public function editar(string $nombre_etiqueta, string $icono_etiq)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `etiquetas` SET nombre_etiqueta = :nombre_etiqueta, icono_etiq = :icono_etiq WHERE etiquetas.id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre_etiqueta' => $nombre_etiqueta,
                'icono_etiq' => $icono_etiq
            ]
        );
        
    }
    

    /**
     * Método que elimina instancia de la base de datos
     */
    public function eliminar($id)
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `etiquetas` WHERE `etiquetas`.`id` = ?";

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
     * Get the value of nombre_etiqueta
     */
    public function getNombre_etiqueta()
    {
        return $this->nombre_etiqueta;
    }

    /**
     * Get the value of icono_etiq
     */
    public function getIcono_etiq()
    {
        return $this->icono_etiq;
    }
}
