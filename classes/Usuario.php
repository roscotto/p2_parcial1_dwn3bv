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
    private $ult_digitos_tarj;
    private $dni;
    private $telefono;
    private $calle;
    private $altura;
    private $cp;
    private $localidad;
    private $provincia;
    

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
        $query = "SELECT * FROM usuarios
        LEFT JOIN usuarios_info_adicional ON usuarios_info_adicional.id = usuarios.id
        WHERE usuarios.id = ?";

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

    /**
     * Get the value of ult_digitos_tarj
     */ 
    public function getUlt_digitos_tarj()
    {
        return $this->ult_digitos_tarj;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Get the value of calle
     */ 
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Get the value of altura
     */ 
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Get the value of localidad
     */ 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Get the value of provincia
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }
}
