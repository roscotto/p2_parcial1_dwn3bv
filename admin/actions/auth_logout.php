<?PHP 
require_once "../../functions/autoload.php";
$ref = $_GET['ref'] ?? FALSE;

(new Autenticacion())->log_out();

if ($ref == "front") {
    header("Location: ../../index.php?sec=login");
} else {
    header("Location: ../index.php?sec=login");
}



