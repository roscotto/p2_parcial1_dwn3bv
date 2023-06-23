<?PHP 
require_once "../../functions/autoload.php";
session_start();

(new Autenticacion())->log_out();
header("Location: ../index.php?sec=login");

