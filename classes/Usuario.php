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
     * Método que registra un usuario nuevo en la base de datos
     * @param string $usuario
     * @param string $nombre
     * @param string $apellido
     * @param string $contrasena
     * @param string $email
     * @param string $rol
     */
    public function registrar_usuario(string $usuario, string $nombre, string $apellido, string $contrasena, string $email, string $rol = 'usuario')
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO usuarios (usuario, nombre, apellido, contrasena, email, rol) VALUES (:usuario, :nombre, :apellido, :contrasena, :email, :rol)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'usuario' => $usuario,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'contrasena' => $contrasena,
                'email' => $email,
                'rol' => $rol
            ]
        );
        
    }

    /**
     * Método que crea una nueva fila vacía en la tabla usuarios_info_adicional, al momento de registrarse un usuario
     */
    public function crear_fila_info_adicional() 
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO usuarios_info_adicional (id) VALUES (:id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $_SESSION['id_usuario']
            ]
        );
    }



    // /**
    //  * Método que carga datos adicionales de un usuario (durante el checkout) en la base de datos
    //  * @param int $ult_digitos_tarj Últimos 4 dígitos de la tarjeta de crédito
    //  * @param int $dni DNI del usuario
    //  * @param int $telefono Teléfono del usuario
    //  * @param string $calle Calle del usuario
    //  * @param int $altura Altura de la calle del usuario
    //  * @param int $cp Código postal del usuario
    //  * @param string $localidad Localidad del usuario
    //  * @param string $provincia Provincia del usuario
    //  */
    // public function cargar_datos_adicionales(int $ult_digitos_tarj, int $dni, int $telefono, string $calle, int $altura, int $cp, string $localidad, string $provincia)
    // {
    //     $conexion = Conexion::getConexion();
    //     $query = "INSERT INTO usuarios_info_adicional (id, ult_digitos_tarj, dni, telefono, calle, altura, cp, localidad, provincia) VALUES (:id, :ult_digitos_tarj, :dni, :telefono, :calle, :altura, :cp, :localidad, :provincia)";

    //     $PDOStatement = $conexion->prepare($query);
    //     $PDOStatement->execute(
    //         [
    //             'id' => $_SESSION['id_usuario'],
    //             'ult_digitos_tarj' => $ult_digitos_tarj,
    //             'dni' => $dni,
    //             'telefono' => $telefono,
    //             'calle' => $calle,
    //             'altura' => $altura,
    //             'cp' => $cp,
    //             'localidad' => $localidad,
    //             'provincia' => $provincia
    //         ]
    //     );
    // }


  



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
