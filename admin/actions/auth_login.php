<?PHP 
require_once "../../functions/autoload.php";
session_start();

$postData = $_POST;

$login = (new Autenticacion())->log_in($postData['usuario'], $postData['contrasena']);

if ($login) {
    header("Location: ../index.php?sec=dashboard");
} else {
    header("Location: ../index.php?sec=login"); //&error=1
}