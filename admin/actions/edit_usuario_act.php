<?PHP
require_once '../../functions/autoload.php';

$postData = $_POST;


$datosUsuario = $_SESSION['usuarioLogueado'];



try {
    $idUsuario = $datosUsuario['id'];
    $usuario = (new Usuario())->get_x_id($idUsuario);

    $usuario->editar_datos_principales($postData['usuario'], $postData['nombre'], $postData['apellido'], $postData['email']);
    $usuario->editar_datos_adic_sin_tarjeta($postData['dni'], $postData['telefono'], $postData['calle'], $postData['altura'], $postData['cp'], $postData['localidad'], $postData['provincia']);

    (new Alerta())->registrar_alerta('success', "Se editaron los datos correctamente.");
    header("Location: ../../index.php?sec=panel_usuario");
} catch (Exception $e) {
    die("No se pudieron editar los datos.");
}
