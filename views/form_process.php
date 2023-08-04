<?PHP
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

var_dump(soloNumeros($inputTelefono) );
var_dump(isset($inputTelefono));
//header('Location: ../index.php?sec=contacto');
// die;
if (isset($inputNombre)){
  $mensaje = $mensaje."*el nombre es requerido <br>";
  $bandera = true;
}
if (isset($inputEmail)){
  $mensaje = $mensaje."*el email es requerido <br>";
  $bandera = true;
}
if (isset($inputComentario)){
  $mensaje = $mensaje."*el comentario es requerido <br>";
  $bandera = true;
}


if ($bandera){
  (new Alerta())->registrar_alerta('danger', $mensaje);
  header('Location: ../index.php?sec=contacto');
}
?>
<section class="contacto">
  <div class="container mt-3  mx-auto py-5">
    <h2>Muchas gracias por tu mensaje! <?= $inputNombre ?> <?= $inputApellido ?></h2>
    
    <h3>A la brebedad te estaremos contactando por la siguiente consulta:</h3>
    <p>Comentario: <?= $inputComentario ?></p>
  
    <p>Te contactaremos a este email <strong><?= $inputEmail ?></strong> o a este télefono <strong><?= $inputTelefono ?></strong>.</p>
  </div>
</section>