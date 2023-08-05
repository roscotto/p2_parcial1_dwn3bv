<?PHP
$carrito = new Carrito();
$productosCarrito = $carrito->listar_productos();

$cantidadProductos = $carrito->cantidad_total_productos();
$precioTotal = $carrito->precio_total();

$datosUsuario = $_SESSION['usuarioLogueado'];
?>

<div class="container">

    <div class="row"></div>

    <div class="col-12 p-4 mx-auto">
        <h2 class="text-center mt-5 mb-4">Checkout</h2>

        <section id="medios-pago" class="py-5">
            <div>
                <div id="container-formulario" class="row mx-auto py-5 d-flex">

                    <div class="container" id="tarjetaDatos">
                        <form class="row" action="actions/checkout_act.php" method="POST" autocomplete="off">
                            <h3 class="h2" class="mt-5">Ingresá los datos de tu tarjeta</h3>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="ult_digitos_tarj">Número *</label>
                                    <input autocomplete="off" class="form-control border-dark-violet" type="number" name="ult_digitos_tarj" id="ult_digitos_tarj" placeholder="XXXX XXXX XXXX XXXX" aria-describedby="d-tarjeta" maxlength="16" require>
                                    <span id="text"></span>
                                    <p class="form-text" id="d-tarjeta">Sin espacios</p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="vto">Vencimiento *</label>
                                    <input autocomplete="off" class="form-control border-dark-violet" type="number" name="vto" id="vto" placeholder="XX/XX" aria-describedby="d-vencimiento" minlength="5" maxlength="5" require>
                                    <span id="text"></span>
                                    <p class="form-text" id="d-vencimiento">Respetando el formato mes/año. Ej: 03/23</p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="codigo">Cód. de Seguridad *</label>
                                    <input autocomplete="off" class="form-control border-dark-violet" type="number" name="codigo" id="codigo" placeholder="XXX" aria-describedby="d-codigo" minlength="3" maxlength="3" require>
                                    <span id="text"></span>
                                </div>
                                <div class="col-6">
                                    <label for="inputNombreTarjeta" class="form-label">Nombre como figura en la tarjeta *</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="inputNombreTarjeta" name="inputNombreTarjeta" require>
                                    <span id="text"></span>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 border-bottom border-2 py-2"></div>

                <div class="col-12 pt-4">
                    <div class="row g-3">
                        <div class="col-12 d-flex mt-md-4">
                            <h3 class="h2">Datos para facturación</h3>
                        </div>
                        <div class="col-6">
                            <label for="inputNombre" class="form-label">Nombre *</label>
                            <input autocomplete="off" type="text" class="form-control border-dark-violet" id="inputNombre" name="inputNombre" value="<?= $datosUsuario['nombre'] ?>" disabled readonly>
                            <span id="text"></span>
                        </div>
                        <div class="col-6">
                            <label for="inputApellido" class="form-label">Apellido *</label>
                            <input type="text" class="form-control border-dark-violet" id="inputApellido" name="inputApellido" value="<?= $datosUsuario['apellido'] ?>" disabled readonly>
                            <span id="text"></span>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="dni">DNI *</label>
                            <input class="form-control border-dark-violet" type="number" name="dni" id="dni" placeholder="12345678" aria-describedby="d-dni" minlength="8">
                            <span id="text"></span>
                            <p class="form-text" id="d-dni">Sin puntos ni espacios</p>
                        </div>
                        <div class="col-6">
                            <label for="inputEmail" class="form-label">Email *</label>
                            <input type="email" class="form-control border-dark-violet" id="inputEmail" name="inputEmail" aria-describedby="d-email" value="<?= $datosUsuario['email'] ?>" disabled readonly>
                            <span id="text" ></span>
                            <p class="form-text" id="d-email">emaildeejemplo@hotmail.com</p>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="telefono">Teléfono *</label>
                            <input class="form-control border-dark-violet" type="number" name="telefono" id="telefono" <?= isset($datosUsuario['telefono']) ? $datosUsuario['telefono'] : "" ?>>
                            <span id="text"></span>
                            <p class="form-text" id="d-telefono">Solo números, sin guiones.</p>
                        </div>

                        <div class="col-12 border-bottom border-2 py-3"></div>

                    </div>

                    <div class="row d-flex mt-md-4">
                        <h3 class="h2">Datos de envío: </h3>
                        <div class="col-6">
                            <label for="calle" class="form-label">Calle:</label>
                            <input autocomplete="off" type="text" class="form-control border-dark-violet" id="calle" name="calle" value="<?= isset($datosUsuario['calle']) ? $datosUsuario['calle'] : "" ?>">
                            <span id="text"></span>
                        </div>
                        <div class="col-3">
                            <label for="altura" class="form-label">Altura:</label>
                            <input autocomplete="off" type="text" class="form-control border-dark-violet" id="altura" name="altura" value="<?= isset($datosUsuario['altura']) ? $datosUsuario['altura'] : "" ?>">
                            <span id="text"></span>
                        </div>
                        <div class="col-3">
                            <label for="cp" class="form-label">CP:</label>
                            <input autocomplete="off" type="text" class="form-control border-dark-violet" id="cp" name="cp" value="<?= isset($datosUsuario['cp']) ? $datosUsuario['cp'] : "" ?>">
                            <span id="text"></span>
                        </div>
                        <div class="col-6 pt-3">
                            <label for="localidad" class="form-label">Localidad:</label>
                            <input autocomplete="off" type="text" class="form-control border-dark-violet" id="localidad" name="localidad" value="<?= isset($datosUsuario['localidad']) ? $datosUsuario['localidad'] : "" ?>">
                            <span id="text"></span>
                        </div>
                        <div class="col-6 pt-3">
                            <label for="provincia" class="form-label">Provincia:</label>
                            <input autocomplete="off" type="text" class="form-control border-dark-violet" id="provincia" name="provincia" value="<?= isset($datosUsuario['provincia']) ? $datosUsuario['provincia'] : "" ?>">
                            <span id="text"></span>
                        </div>
                    </div>
                    <div>


                        <div class="col-12 border-bottom border-2 py-3"></div>
                        <div class="py-5">
                            <div>
                                <h3 class="h2 pb-5">Productos en tu carrito:</h3>
                                <div id="listaCarrito" class="row d-flex pb-3">
                                    <?PHP
                                    foreach ($productosCarrito as $producto) {
                                        $subtotal = $producto['precio'] * $producto['cantidad'];

                                    ?>

                                        <div class="col-3 text-center"><a href="index.php?sec=detalle_prod&id=<?= $key ?>">
                                                <img src="./img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['alt'] ?>" class="img-fluid shadow-sm" width="100"></a>
                                            <p><?= $producto['nombre'] ?></p>
                                        </div>
                                    <?PHP } ?>
                                </div>

                                <div class="col-12 border-bottom border-2 "></div>
                                <p class="h6 my-3"><b>Cantidad de productos: </b> <?= $cantidadProductos ?></span>
                                </p>
                                <div class="col-12 border-bottom border-2 "></div>

                                <p class="h6 my-3"><b>Total: </b>$ <?= $precioTotal ?></span></p>
                                <div class="col-12 border-bottom border-2 "></div>
                            </div>

                        </div>

                        <div class="col-12">
                            <input type="submit"  class="btn shadow-sm btn-grey-white w-50" value="Comprar">
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>



    </div>
</div>