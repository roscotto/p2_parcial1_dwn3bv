<?PHP 
require_once '../functions/autoload.php';

$postData = $_POST;

//echo "<pre>";
//print_r($postData);
//echo "</pre>";

if(!empty($postData)){
    (new Carrito())->actualizar_carrito($postData['cantidad']);
    header('Location: ../index.php?sec=carrito');
};