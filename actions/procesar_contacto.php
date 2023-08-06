<?PHP 
require_once '../functions/autoload.php';

//inicializo variables con los datos que necesito traer de la superglobal
$bandera = false;
$mensaje = "";
$inputNombre = $_POST['inputNombre'];
$inputApellido = $_POST['inputApellido'];
$inputEmail = $_POST['inputEmail'];
$inputTelefono = $_POST['inputTelefono'];
$inputComentario = $_POST['inputComentario'];

function soloNumeros($str){
  return preg_match('/^([^0-9]*)$/', $str);
}

function soloCaracteres($str){
  return preg_match('/^([^a-zA-Z]*)$/', $str);
}

function validarEmail($str){
  return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $str);
}

//var_dump(isset($inputNombre));
//var_dump($inputComentario );
//var_dump(isset($inputTelefono));
//die;
if ($inputNombre != ""){
  $mensaje = $mensaje."*el nombre es requerido <br>";
  $bandera = true;
}
if ($inputEmail != ""){
  $mensaje = $mensaje."*el email es requerido <br>";
  $bandera = true;
}
if ($inputComentario != ""){
  $mensaje = $mensaje."*el comentario es requerido <br>";
  $bandera = true;
}


if ($bandera){
  (new Alerta())->registrar_alerta('danger', $mensaje);
  header('Location: ../index.php?sec=contacto');
  
}else{
    header('Location: ../index.php?sec=form_process');
}

