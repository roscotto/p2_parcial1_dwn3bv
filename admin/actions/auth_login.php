<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = (new Autenticacion())->log_in($postData['usuario'], $postData['contrasena']);

if ($login) {
    if ($login == "usuario") {
        header("Location: ../../index.php?sec=panel_usuario");
    } else {
        header("Location: ../index.php?sec=dashboard");
    }
    
} else {
    header("Location: ../index.php?sec=login"); //&error=1
}