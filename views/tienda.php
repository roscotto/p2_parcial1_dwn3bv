<?PHP
$id_categoria = $_GET['cat'] ?? FALSE;

$categoria = (new Categoria())->get_x_id($id_categoria);

$nombre_categoria = $categoria->getNombre();
$descripcion_categoria = $categoria->getDescripcion();

if ($id_categoria == "8") {
    $catalogo = (new Producto())->catalogo_precio_menor_a(5000);
} else {
   $catalogo = (new Producto())->catalogo_x_categoria($id_categoria);
}

//corrijo la falta de tildes y agrego mayúscula en la categoría
$titulo = ucwords(str_replace("cion", "ción", $nombre_categoria));


?>


<!-- sección tienda-->
<section id="tienda" class="my-lg-5">
    <div class="row container mx-auto mt-4">
        <div class="col-12 my-4 text-center d-flex">
            <div class="mx-auto d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#8EA3A6" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                </svg>
                <?php
                    if ($titulo == "Todos"){
                        echo '<h2 class="ps-3"><span class="grey">Todos</span> nuestros productos</h2>';
                    }else if ($titulo == "Rebajas"){
                        echo '<h2 class="ps-3">Todos nuestros <span class="grey">Productos -$5000</span></h2>';
                    }
                    else {
                    ?>    
                        <h2 class="ps-3">Tienda de productos para <span class="grey"><?= $titulo ?></span></h2>
                    <?php
                    }
                    ?>
                    
            </div>
        </div>
        <div class="col-12">
            <div class="row d-flex g-3">
            <p class="col-10 mx-auto p-2"><strong><?=$descripcion_categoria?></strong></p>
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

                <!-- cierro el bloque del foreach -->



            </div>
        </div>
    </div>
</section>