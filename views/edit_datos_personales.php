<?PHP
$carrito = new Carrito();
$productosCarrito = $carrito->listar_productos();

$cantidadProductos = $carrito->cantidad_total_productos();
$precioTotal = $carrito->precio_total();

$datosUsuario = $_SESSION['usuarioLogueado'];

$usuarioDB = (new Usuario())->get_x_id($datosUsuario['id']);


?>

<div class="container">

    <div class="row"></div>

    <div class="col-12 p-4 mx-auto">
        <h2 class="text-center mt-5 mb-4">Editar datos personales</h2>

        <section id="medios-pago" class="py-5">
            <div>
                <div id="container-formulario" class="row mx-auto py-3 d-flex">


                    <form class="row" action="admin/actions/edit_usuario_act.php" method="POST" autocomplete="off">
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-12 d-flex">
                                    <h3 class="h2">Tus datos personales</h3>
                                </div>
                                <div class="col-6">
                                    <label for="usuario" class="form-label">Nombre de usuario *</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="usuario" name="usuario" value="<?= $usuarioDB->getUsuario() ?>">
                                    <span id="text"></span>
                                </div>
                                <div class="col-6">
                                    <label for="nombre" class="form-label">Nombre *</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="nombre" name="nombre" value="<?= $usuarioDB->getNombre() ?>">
                                    <span id="text"></span>
                                </div>
                                <div class="col-6">
                                    <label for="apellido" class="form-label">Apellido *</label>
                                    <input type="text" class="form-control border-dark-violet" id="apellido" name="apellido" value="<?= $usuarioDB->getApellido() ?>"" >
                            <span id=" text"></span>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="dni">DNI *</label>
                                    <input class="form-control border-dark-violet" type="number" name="dni" id="dni" aria-describedby="d-dni" minlength="8" value="<?= $usuarioDB->getDni() ?>">
                                    <span id="text"></span>
                                    <p class="form-text" id="d-dni">Sin puntos ni espacios</p>
                                </div>
                                <div class="col-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control border-dark-violet" id="email" name="email" aria-describedby="d-email" value="<?= $usuarioDB->getEmail() ?>"" >
                            <span id=" text"></span>
                                    <p class="form-text" id="d-email">emaildeejemplo@hotmail.com</p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="telefono">Teléfono *</label>
                                    <input class="form-control border-dark-violet" type="number" name="telefono" id="telefono" value="<?= $usuarioDB->getTelefono() ?>">
                                    <span id="text"></span>
                                    <p class="form-text" id="d-telefono">Solo números, sin guiones.</p>
                                </div>

                                <div class="col-12 border-bottom border-2 py-3"></div>

                            </div>

                            <div class="row d-flex mt-md-4">
                                <h3 class="h2">Datos de envío: </h3>
                                <div class="col-6">
                                    <label for="calle" class="form-label">Calle:</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="calle" name="calle" value="<?= $usuarioDB->getCalle() ?>">
                                    <span id="text"></span>
                                </div>
                                <div class="col-3">
                                    <label for="altura" class="form-label">Altura:</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="altura" name="altura" value="<?= $usuarioDB->getAltura() ?>">
                                    <span id="text"></span>
                                </div>
                                <div class="col-3">
                                    <label for="cp" class="form-label">CP:</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="cp" name="cp" value="<?= $usuarioDB->getCp() ?>">
                                    <span id="text"></span>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="localidad" class="form-label">Localidad:</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="localidad" name="localidad" value="<?= $usuarioDB->getLocalidad() ?>">
                                    <span id="text"></span>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="provincia" class="form-label">Provincia:</label>
                                    <input autocomplete="off" type="text" class="form-control border-dark-violet" id="provincia" name="provincia" value="<?= $usuarioDB->getProvincia() ?>">
                                    <span id="text"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-5 d-flex justify-content-center">
                                    <input type="submit" class="btn shadow-sm btn-grey-white w-50" value="Actualizar datos">

                                </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                            <a class="btn btn-grey-white w-50 mt-3" href="index.php?sec=panel_usuario">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
    </div>

    </section>



</div>
</div>