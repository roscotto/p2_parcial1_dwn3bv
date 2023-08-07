<?PHP
$idSeleccionado = $_GET['id'] ?? FALSE;

$producto = (new Producto())->producto_x_id($idSeleccionado);
$titulo_categoria = ucwords(str_replace("cion", "ción", $producto->getCategoria()));

$carrito = new Carrito();
$productosCarrito = $carrito->listar_productos();

if (empty($productosCarrito)) {
    $cantidad = 0;
} else {
    foreach ($productosCarrito as $key => $value){
        if($idSeleccionado == $value['id']){
            $cantidad = $value['cantidad'];
        } else {
            $cantidad = 0;
        }
    }

}



?>


<section id="detalle" class="container">
    <div class="row my-5">

        <?PHP if (!empty($producto)) { ?>
            <div class="col-12">
                <h2 class="fw-bold" id=""><?= $titulo_categoria ?></h2>

            </div>
            <div class="col-12 d-flex">
                <div class="row">
                    <div class="col-12 col-md-4 py-2">
                        <img src="./img/productos/<?= $producto->getImagen() ?>" class="img-fluid d-block w-100" alt="<?= $producto->getAlt() ?>">
                    </div>
                    <div class="col-md-7 card-body ps-4">

                        <div>
                            <h3 class="card-text fw-bold text-dark-violet fs-2"><?= $producto->getNombre_prod() ?></h3>
                            <p class="h4 card-text fw-bold text-dark-violet fs-5">Origen: <?= $producto->getOrigen() ?></p>
                            <div class="row">
                                <div class="col-12 col-lg-6 ">
                                    <div class="mt-4">
                                        <p><?= $producto->getDescripcion() ?>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 ">
                                    <div class="d-flex row justify-content-end">

                                        <?PHP foreach ($producto->getEtiquetas() as $e) { ?>

                                            <div class="col-4">
                                                <img src="img/etiquetas/<?= $e->getIcono_etiq() ?>" alt="Imágen Illustrativa de <?= $e->getNombre_etiqueta() ?>" class="img-fluid rounded">
                                                <p class="text-center pt-2"><b><?= $e->getNombre_etiqueta(); ?></b></p>
                                            </div>


                                        <?PHP  } ?>


                                    </div>
                                </div>
                            </div>


                            <br>
                            <?= $producto->en_promocion() ?>
                            </p>
                            <p class=""><small><b>Cuidados:</b> <?= $producto->getCuidado() ?></small></p>
                            <p class=""><small><b>Material:</b> <?= $producto->getMaterial() ?></small></p>
                            <p class=""><small><b>Peso:</b> <?= $producto->getPeso() ?></small></p>
                            <p class=""><small><b>Medidas:</b> <?= $producto->getMedidas() ?></small></p>
                            <p class="fs-3 fw-bold my-3"><?= $producto->precio_formateado() ?></p>

                        </div>

                        <div class="mb-5">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
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
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Ver formas de envío
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <img src="./img/envio.jpg" class="img-fluid" alt="Correo Argentino, Correo Privado, Retiro en sucursal, Acordar con el vendedor">

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-12">


                <div>
                    <form action="actions/add_prod_carrito_act.php" method="GET" class="row justify-content-end align-items-end">
                        <div class="col-6 col-lg-1">
                            <label for="cantidad" class="form-label">Cantidad: </label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" value="1">
                            <input type="hidden" name="id" id="id" value="<?= $producto->getId() ?>">
                        </div>
                        <div class="col-6 col-lg-2">
                            <input type="submit" class="btn shadow-sm btn-grey-white w-100" value="Agregar al carrito"></input>
                            <input type="hidden" value="<?= $producto->getId() ?>" name="id" id="id">
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <p>En tu carrito ya agregaste <?= $cantidad ?> unidades de este producto.</p>
                </div>
            </div>
    </div>

<?PHP } else { ?>

    <div class="col-12">
        <h2 class="fw-bold mt-5 text-center" id="">No se encontró el producto que estás buscando.</h2>

    </div>

<?PHP } ?>

</section>