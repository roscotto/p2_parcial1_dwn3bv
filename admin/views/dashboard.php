<?PHP
$datosUsuario = $_SESSION['usuarioLogueado'];

$productosCargados = (new Producto())->catalogo_completo();
$cantidadProductos = count($productosCargados);
// echo "<pre>";
// print_r($datosUsuario);
// echo "</pre>";
?>

<section id="dashboard_admin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 pt-lg-0 align-self-center mt-5">
                <div class="pt-4 ">
                    <h2 class="pb-md-3 text-center ">¡Bienvenid@ <?= $datosUsuario['nombre'] ?> al Panel de Administración!</h2>
                </div>
            </div>
            <div class="col-8 p-2  pb-md-0">
                <p class=" text-center pb-5"> Acá podrás administrar todos los productos de tu tienda online. Tendrás la posibilidad de cargar nuevos productos, editar o borrar productos existentes y, de igual manera, gestionar las categorías, países de origen y etiquetas disponibles.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 bg-lavanda text-center align-middle px-4 py-5  rounded-3 btn m-2">
                <a href="index.php?sec=admin_productos">
                    <div class="">
                        <h3>Productos</h3>
                    </div>
                </a>
            </div>
            <div class="col-4 bg-verde text-center align-middle px-4 py-5  rounded-3 btn m-2">
                <a href="index.php?sec=admin_categorias">
                    <div class="">
                        <h3>Categorías</h3>
                    </div>
                </a>
            </div>

            <div class="col-4 bg-rosa text-center align-middle px-4 py-5  rounded-3 btn m-2">
                <a href="index.php?sec=admin_origen">
                    <div class="">
                        <h3>Países de Origen</h3>
                    </div>
                </a>
            </div>
            <div class="col-4 bg-amarillo text-center align-middle px-4 py-5  rounded-3 btn m-2">
                <a href="index.php?sec=admin_etiquetas">
                    <div class="">
                        <h3>Etiquetas</h3>
                    </div>
                </a>
            </div>

        </div>
        <div class="row justify-content-center">
        <div class="col-12">
            <p class="h2 text-center mt-5 mb-5">Actualmente tenés <?= $cantidadProductos?> productos cargados.</p>
        </div>
        </div>

    </div>
</section>