<?PHP
$datosUsuario = $_SESSION['usuarioLogueado'];

$compras = (new Compra())->listar_compras();
?>

<div class="container pb-5">

    <div class="row">

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
                        <?PHP foreach ($compras as $c) { ?>
                <div class=" accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Ver métodos de pago
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <img class="img-fluid" src="./img/pagos.jpg" alt="Mercado pago, mastercard, visa, american express, tarjeta naranja, pago facil, rapipago, transferencia bancaria, efectivo o acordar con el vendedor">
                                    </div>
                                </div>
                            </div>
                        <?PHP } ?>
                </div>


            </div>
        </div>



    </div>
</div>
</div>