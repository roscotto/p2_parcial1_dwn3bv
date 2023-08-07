<?PHP
$terminoBusqueda = $_GET['q'] ?? FALSE;


$nombre_categoria = $categoria->getNombre();
$descripcion_categoria = $categoria->getDescripcion();

if (isset($terminoBusqueda) && $terminoBusqueda !== FALSE) {
    $catalogo = (new Producto())->buscador($terminoBusqueda);
}

//corrijo la falta de tildes y agrego mayúscula en la categoría
$titulo = ucwords(str_replace("cion", "ción", $nombre_categoria));


?>


<!-- sección tienda-->
<section id="tienda" class="my-lg-5">
    <div class="row container mx-auto mt-4">
        <div class="col-12 my-4 text-center d-flex">
            <div class="mx-auto d-flex">
                <div class="row">
                    <div class="col-12">                        
                        <h2 class="ps-3">Resultados encontrados para: <span class="grey"><?= $terminoBusqueda ?></span></h2>
                    </div>
                    <div class="col-12">
                        <?= (new Alerta())->mostrar_alertas() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row d-flex g-3">
                <?PHP if (isset($catalogo)) {   ?>
                    <?PHP foreach ($catalogo as $producto) {   ?>
                        <div class="col-12 col-sm-10 col-md-6 col-lg-4 mx-auto">
                            <div class="card  shadow-sm mx-auto bg-sand" style="width: 18rem;">
                                <img src="./img/productos/<?= $producto->getImagen() ?>" class=" img-fluid" alt="<?= $producto->getAlt() ?>">
                                <div class="card-body">
                                    <p class="card-text"><b><?= $titulo ?></b></p>
                                    <h3 class="card-title fs-4 fw-bold"><?= $producto->getNombre_prod() ?></h3>
                                    <p class="card-text"><?= $producto->recortar_palabras(15) ?></p>
                                    <p class="fs-3 fw-semibold"><?= $producto->precio_formateado() ?></p>
                                    <a href="index.php?sec=detalle_prod&id=<?= $producto->getId() ?>" class="btn shadow-sm btn-grey-white w-100">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?PHP } ?>
                <?PHP } ?>    

                <!-- cierro el bloque del foreach -->



            </div>
        </div>
    </div>
</section>