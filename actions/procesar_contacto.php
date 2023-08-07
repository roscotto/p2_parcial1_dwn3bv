<?PHP 
require_once '../functions/autoload.php';

//inicializo variables con los datos que necesito traer de la superglobal
$bandera = true;
$mensaje = "";
$inputNombre = $_POST['inputNombre'];
$inputEmail = $_POST['inputEmail'];
$inputTelefono = $_POST['inputTelefono'];
$inputComentario = $_POST['inputComentario'];

function soloNumeros($str){
  return preg_match('/^([^0-9]*)$/', $str);
}

function soloCaracteres($str){
  return preg_match('/^([A-Za-zñÑáéíóúÁÉÍÓÚ\s])*$/', $str);
}

function validarEmail($str){
  return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $str);
}


if ($inputNombre == ""){
  $mensaje = $mensaje."*el nombre es requerido <br>";
  $bandera = false;
}
if (!soloCaracteres($inputNombre)){
    $mensaje = $mensaje."*el nombre no puede contener números, ni caracteres especiales <br>";
    $bandera = false;
}
if ($inputEmail == ""){
  $mensaje = $mensaje."*el email es requerido <br>";
  $bandera = false;
}
if (!validarEmail($inputEmail)){
    $mensaje = $mensaje."*email invalido <br>";
    $bandera = false;
}
if ($inputComentario == ""){
  $mensaje = $mensaje."*el comentario es requerido <br>";
  $bandera = false;
}
if ($inputTelefono == ""){
  $mensaje = $mensaje."*el telefono es requerido <br>";
  $bandera = false;
}



if ($bandera){
  header('Location: ../index.php?sec=form_process&nombre='.$inputNombre.'&email='.$inputEmail.'&tel='.$inputTelefono.'&comentario='.$inputComentario);
  
}else{
    (new Alerta())->registrar_alerta('danger', $mensaje);
    header('Location: ../index.php?sec=contacto');
}

