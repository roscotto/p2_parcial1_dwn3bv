<?PHP
$datosUsuario = $_SESSION['usuarioLogueado'];


?>

<div class="container">

    <div class="row"></div>

    <div class="col-12 p-4 mx-auto">
        <div class="pt-4 ">
            <h2 class="pb-md-3 text-center ">¡Bienvenid@ <?= $datosUsuario['nombre'] ?> a tu Panel de Usuario!</h2>
        </div>



    </div>
</div>