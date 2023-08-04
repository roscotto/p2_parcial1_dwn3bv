<?PHP

class Usuario
{
    private $id;
    private $usuario;
    private $nombre;
    private $apellido;
    private $contrasena;
    private $email;
    private $rol;


    /**
     * Encuentra un usuario por su nombre de usuario
     * @param string $usuario
     * @return ?Usuario
     */
    public function encontrar_x_usuario(string $usuario): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'usuario' => $usuario
            ]
        );

        $usuarioDB = $PDOStatement->fetch();

        if (!$usuarioDB) {
            return null;
        } else {
            return $usuarioDB;
        }
    }


    /**
     * Devuelve los datos de un usuario en particular
     * @param int $id El ID del usuario
     */
    public function get_x_id(int $id): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $usuario = $PDOStatement->fetch();

        return $usuario ?? null; //si no lo encuentra, retorna null

    }














    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get the value of contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }
}
