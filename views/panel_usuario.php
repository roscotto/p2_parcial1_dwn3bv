<?PHP
$datosUsuario = $_SESSION['usuarioLogueado'];
$idUsuario = $_SESSION['usuarioLogueado']['id'] ?? FALSE;





$comprasUsuario = (new Compra())->compras_x_usuario($idUsuario);

$usuarioDatosDB = (new Usuario())->get_x_id($idUsuario);


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
                    <div class="row">
                        <div class="col-10">
                            <h3 class="py-3"">Tus datos personales:</h3>
                        </div>
                        <div class=" col-2">
                                <div class="p-2 align-self-end"><a href="index.php?sec=edit_datos_personales&id=<?= $idUsuario ?>" class="ps-3"><img src="./img/iconos/icon-edit.png" alt="editar"></a></div>
                        </div>
                    </div>
                    
                    <p><b>Usuario:</b> <?= $usuarioDatosDB->getUsuario() ?></p>
                    <p><b>Nombre completo:</b> <?= $usuarioDatosDB->getNombre() . " " . $usuarioDatosDB->getApellido() ?></p>

                    <p><b>Email: </b><?= $usuarioDatosDB->getEmail() ?></p>
                    <p><b>DNI: </b><?= $usuarioDatosDB->getDni() ?></p>
                    <p><b>Teléfono: </b><?= $usuarioDatosDB->getTelefono() ?></p>
                    <p><b>Dirección: </b><?= $usuarioDatosDB->getCalle() . " " . $usuarioDatosDB->getAltura() ?> <b>- CP: </b><?= $usuarioDatosDB->getCp() ?></p>
                    <p><b>Localidad: </b><?= $usuarioDatosDB->getLocalidad() ?></p>
                    <p><b>Provincia: </b><?= $usuarioDatosDB->getProvincia() ?></p>


                </div>
                <div class=" col-5 bg-light-orange px-4 py-3 rounded-3 m-2 shadow-sm">
                    <h3 class="py-3"">Tus compras:</h3>
                        <?PHP
                        $vuelta = 0;
                        if (empty($comprasUsuario)) { ?>
                            <p class=" text-center">Aún no tenés compras realizadas.</p>
                        <?PHP } else {
                            foreach ($comprasUsuario as $c) { ?>
                            <div class=" accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading<?= $vuelta ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $vuelta ?>" aria-expanded="false" aria-controls="flush-collapse<?= $vuelta ?>">
                                            Compra <?= $vuelta + 1 ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse<?= $vuelta ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $vuelta ?>" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <p><b>Fecha:</b> <?= (new Compra())->formatearFecha($c->getFecha()); ?></p>
                                            <p><b>Productos adquiridos:</b> </p>
                                            <ul>

                                                <?PHP foreach ($c->getProductos() as $p) {
                                                    $producto = $p['producto'];
                                                ?></p>
                                                    <li>
                                                        <p><?= $producto->getNombre_prod() ?> - (<?= $p['cantidad'] ?> un)</p>
                                                    </li>

                                                <?PHP  } ?>
                                            </ul>
                                            <p><b>Importe Total:</b> $ <?= number_format($c->getImporte(), 2, ",", ".") ?> </p>
                                        </div>
                                    </div>
                                </div>
                        <?PHP $vuelta += 1;
                            }
                        } ?>
                            </div>


                </div>
            </div>



        </div>
    </div>
</div>