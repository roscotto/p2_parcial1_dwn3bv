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
        $conexion = (new Conexion())->getConexion();
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
