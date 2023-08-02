<?PHP
$datosUsuario = $_SESSION['usuarioLogueado'];

?>

<div class="container pb-5">

    <div class="row"></div>

    <div class="col-12 p-4 mx-auto pb-5">
        <div class="pt-4 ">
            <h2 class="pb-md-3 text-center ">¡Bienvenid@ <?= $datosUsuario['nombre'] ?> a tu Panel de Usuario!</h2>
        </div>
        <div class="row">
            <?= (new Alerta())->mostrar_alertas() ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 bg-light-orange px-4 py-3 rounded-3 m-2 shadow-sm">
                <h3 class="py-3"">Tus datos personales:</h3>
                <p><b>Usuario:</b> <?= $datosUsuario['usuario'] ?></p>
                <p><b>Nombre completo:</b> <?= $datosUsuario['nombre'] . " " . $datosUsuario['apellido'] ?></p>
               
                <p><b>Email:</b> <?= $datosUsuario['email'] ?></p>
             

            </div>
            <div class=" col-5 bg-light-orange px-4 py-3 rounded-3 m-2 shadow-sm">
                    <h3 class="py-3"">Tus compras:</h3>
            </div>
        </div>



    </div>
</div>