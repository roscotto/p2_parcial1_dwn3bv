<?PHP

class Autenticacion
{


    /**
     * Método que verifica las credenciales de un usuario y devuelve TRUE si las credenciales son correctas (los guarda en la sesión)
     * @param string $usuario El nombre de usuario
     * @param string $contrasena La contraseña
     * @return bool TRUE si las credenciales son correctas, FALSE si no lo son
     */
    public function log_in(string $usuario, string $contrasena): bool
    {

        // echo "<p>Vamos a intentar autenticar al usuario $usuario</p>";
        // echo "<p>La contraseña es $contrasena</p>";

        $usuarioDB = (new Usuario())->encontrar_x_usuario($usuario); //busca el usuario en la base de datos

        // echo "<pre>";
        // print_r($usuarioDB);
        // echo "</pre>";

        // $password =  $usuarioDB->getContrasena();
        // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // echo "<p>La contraseña en la base de datos es $passwordHash</p>";

        if (password_verify($contrasena, $usuarioDB->getContrasena())) { //compara la contraseña que se está ingresando con la que está en la base de datos

            $datosLogin['id'] = $usuarioDB->getId();
            $datosLogin['usuario'] = $usuarioDB->getUsuario();
            $datosLogin['nombre'] = $usuarioDB->getNombre();
            $datosLogin['apellido'] = $usuarioDB->getApellido();
            $datosLogin['email'] = $usuarioDB->getEmail();
            $datosLogin['rol'] = $usuarioDB->getRol();
            $_SESSION['usuarioLogueado'] = $datosLogin;

            // echo "<pre>";
            // print_r($_SESSION['usuarioLogueado']);
            // echo "</pre>";

            echo "Contraseña correcta";
            return true;
        } else {
            echo "Contraseña incorrecta. Intentá nuevamente";
            return false;
        }
    }


    /**
     * Método que va a borrar los datos de la sesión y redirigir al usuario a la página de login
     */
    public function log_out()
    {
        if (isset($_SESSION['usuarioLogueado'])) {
            unset($_SESSION['usuarioLogueado']);
        }
    }




    /**
     * Método que verifica si el usuario está logueado
     */
    public function check_login(): bool
    {
        if (isset($_SESSION['usuarioLogueado'])) {
            return true;
        } else {
            header("Location: index.php?sec=login");
        }
    }
}
