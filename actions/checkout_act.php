<?PHP 
require_once '../functions/autoload.php';

$productosCarrito = (new Carrito())->listar_productos();

$postData = $_POST;

$idUsuario = $_SESSION['usuarioLogueado']['id'] ?? FALSE;

// echo "<pre>";
// print_r($productosCarrito);
// echo "</pre>";

echo "<pre>";
print_r($postData);
echo "</pre>";



try {
   if($idUsuario) {
      $compraRealizada = [
         "id_usuario" => $idUsuario,
         "fecha" => date("Y-m-d", time()),
         "importe" => (new Carrito())->precio_total(),
      ];

      $productosAdquiridos = [];

      foreach($productosCarrito as $key => $value) { //
         $productosAdquiridos[$key] = $value['cantidad'];
      }

      // echo "<pre>";
      // print_r($compraRealizada);
      // echo "</pre>";
      // echo "<pre>";
      // print_r($productosAdquiridos);
      // echo "</pre>";

      (new Carrito())->insertar_compra_DB($compraRealizada, $productosAdquiridos);

      // me quedo con los últimos 4 dígitos de la tarjeta de crédito
      $ult_digitos_tarj = substr($postData['ult_digitos_tarj'], -4);




      // (new Usuario())->cargar_datos_adicionales($ult_digitos_tarj, $postData['dni'], $postData['telefono'],$postData['calle'], $postData['altura'], $postData['cp'], $postData['localidad'], $postData['provincia'])

      (new Carrito())->vaciar_carrito();

      (new Alerta())->registrar_alerta('success', "La compra se realizó con éxito!");
      header('Location: ../index.php?sec=panel_usuario');


   } else {
      (new Alerta())->registrar_alerta('warning', "La sesión expiró, por favor volvé a loguearte.");
      header('Location: ../index.php?sec=login');
   }

} catch (Exception $e) {
   echo "<pre>";
   print_r($e);
   echo "</pre>";
   (new Alerta())->registrar_alerta('danger', "No se pudo procesar el pago.");
   header('Location: ../index.php?sec=panel_usuario');
}