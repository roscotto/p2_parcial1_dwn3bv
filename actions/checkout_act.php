<?PHP 
require_once '../functions/autoload.php';

$productosCarrito = (new Carrito())->listar_productos();

$postData = $_POST;

$idUsuario = $_SESSION['usuarioLogueado']['id'] ?? FALSE;

echo "<pre>";
print_r($productosCarrito);
echo "</pre>";

echo "<pre>";
print_r($postData);
echo "</pre>";



try {
   if($idUsuario) {
      $compraRealizada = [
         "id_usuario" => $idUsuario,
         "fecha_hora" => date("Y-m-d", time()),
         "importe" => (new Carrito())->precio_total(),
      ];

      echo "<pre>";
      print_r($compraRealizada);
      echo "</pre>";

   } else {
      (new Alerta())->registrar_alerta('warning', "La sesión expiró, por favor volvé a loguearte.");
      header('Location: ../index.php?sec=login');
   }

} catch (Exception $e) {
   (new Alerta())->registrar_alerta('danger', "No se pudo procesar el pago.");
   header('Location: ../index.php?sec=panel_usuario');
}