<?PHP
$nombre = $_GET['nombre'];
$emial  = $_GET['email'];
$tel    = $_GET['tel'];
$coment = $_GET['comentario'];

?>
<section class="contacto">
  <div class="container mt-3  mx-auto py-5">
    <h2>Muchas gracias por tu mensaje! <?= $nombre ?> </h2>
    
    <h3>A la brevedad te estaremos contactando por la siguiente consulta:</h3>
    <p>Comentario: <?= $coment ?></p>
  
    <p>Te contactaremos a este email <strong><?= $emial ?></strong> o a este télefono <strong><?= $tel ?></strong>.</p>
  </div>
</section>