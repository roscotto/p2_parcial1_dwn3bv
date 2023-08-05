<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;

$usuario = $postData['usuario'];
$nombre = $postData['nombre'];
$apellido = $postData['apellido'];
$contrasena = password_hash($postData['contrasena'], PASSWORD_DEFAULT);
$email = $postData['email'];




try {
    $usuarioNuevo = (new Usuario())->registrar_usuario($usuario, $nombre, $apellido, $contrasena, $email);
    
    (new Usuario())->crear_fila_info_adicional();
        
    (new Alerta())->registrar_alerta('success', 'Pudiste registrarte exitosamente! Ya podés iniciar sesión.');
        header("Location: ../../index.php?sec=login");

} catch (Exception $e) {
    (new Alerta())->registrar_alerta('danger', 'Hubo un error al registrar el usuario.');
    header("Location: ../../index.php?sec=signin");
}