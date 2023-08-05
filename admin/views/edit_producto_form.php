<?PHP

$categorias = (new Categoria)->listar_categorias();
$paisesOrigen = (new Origen)->listar_origen();
$etiquetas = (new Etiqueta)->listar_etiquetas();

$idProducto = $_GET['id'] ?? FALSE;
$producto = (new Producto())->producto_x_id($idProducto);

$etiquetasSeleccionadas = $producto->getEtiquetasIds();


// echo "<pre>";
// print_r($etiquetasSeleccionadas);
// echo "</pre>";

//  echo "<pre>";
//  print_r($producto);
//  echo "</pre>";
?>


<section>
    <div class="container">
    <form action="actions/edit_producto_act.php?id=<?= $producto->getId() ?>" class="row g-4" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex pt-lg-0 align-self-center">
                <div class="col-10 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Editar Producto existente</h2>
                </div>
                
            </div>
            <div class="col-12 ">
                <div class="col-2">
                    <label for="imagen_actual" class="form-label"> Imagen actual</label>
    
                    <img src="../img/productos/<?= $producto->getImagen() ?>" alt="foto de <?= $producto->getNombre_prod() ?>" class="img-fluid">
                    <input type="hidden" class="form-control" id="imagen_actual" name="imagen_actual" value="<?= $producto->getImagen() ?>">
    
                </div>                
                    <div class="col-12">
                        <div class="row pt-3">
                            <div class="col-4">
                                <label for="nombre_prod" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_prod" name="nombre_prod" placeholder="Nombre del producto" value="<?= $producto->getNombre_prod() ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="imagen" class="form-label">Reemplazar foto</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                <div class="form-text">En formato .jpg o .png. de hasta 250 KB y 500x500px</div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="alt" class="form-label">Texto alternativo de la foto</label>
                                    <textarea class="form-control" id="alt" name="alt" rows="3" placeholder="Texto alternativo de la foto"> <?= $producto->getAlt() ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-3">
                                <label for="categoria_id" class="form-label">Categoría</label>
                                <select class="form-select" name="categoria_id" id="categoria_id" required>
                                    <option value="" selected disabled>Elegí una opción</option>
                                    <?PHP foreach ($categorias as $c) { ?>
                                        <option value="<?= $c->getId() ?>" <?= $c->getId() == $producto->getIdCategoria() ? "selected" : "" ?>><?= $c->getNombre() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="origen_id" class="form-label">País de Origen</label>
                                <select class="form-select" name="origen_id" id="origen_id" required>
                                    <option value="" selected disabled>Elegí una opción</option>
                                    <?PHP foreach ($paisesOrigen as $p) { ?>
                                        <option value="<?= $p->getId() ?>" <?= $p->getId() == $producto->getIdOrigen() ? "selected" : "" ?>><?= $p->getNombre() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="material" class="form-label">Material</label>
                                <input type="text" class="form-control" id="material" name="material" placeholder="Tipo de material" value="<?= $producto->getMaterial() ?>" required>
                                <div class="form-text">Si posee más de uno, separarlos por comas.</div>
                            </div>
                            <div class="col-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="<?= $producto->getStock() ?>" required>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-3">
                                <label for="medidas" class="form-label">Medidas</label>
                                <input type="text" class="form-control" id="medidas" name="medidas" placeholder="Medidas" value="<?= $producto->getMedidas() ?>" required>
                                <div class="form-text">Expresadas en centímetros.</div>
                            </div>
                            <div class="col-3">

                                <label for="peso" class="form-label">Peso</label>
                                <input type="text" class="form-control" id="peso" name="peso" placeholder="peso" value="<?= $producto->getPeso() ?>" required>
                                <div class="form-text">Expresado en gramos.</div>

                            </div>
                            <div class="col-3">
                                <label for="cuidado" class="form-label">Cuidado</label>
                                <input type="text" class="form-control" id="cuidado" name="cuidado" placeholder="Cuidado del producto" value="<?= $producto->getCuidado() ?>" required>

                            </div>
                            <div class="col-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" value="<?= $producto->getPrecio() ?>" required>

                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-12">
                                <div>
                                    <label for="descripcion" class="form-label">Descripción del producto</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto">value="<?= $producto->getDescripcion() ?>"</textarea>
                                </div>
                            </div>
                            <div class="row pt-3">
                            <div class="col-12 mb-3">
                                <label for="promocion" class="mx-2">                                    
                                    ¿Este producto se encuentra en promoción?
                                </label>
                                <input type="checkbox" id="promocion" name="promocion" onchange="ocultarMostrarTarjeta()">
                            </div>
                            <div id="esConPromocion" class="col-12" style="display:none;">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inicio_promocion" class="form-label">Inicio Promoción</label>
                                        <input type="datetime-local" class="form-control" id="inicio_promocion" name="inicio_promocion" placeholder="Fecha de inicio de promoción" >
                                        <div class="form-text">Seleccionar fecha y hora del inicio de la promoción.
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="fin_promocion" class="form-label">Fin Promoción</label>
                                        <input type="datetime-local" class="form-control" id="fin_promocion" name="fin_promocion" placeholder="Fecha de fin de la promoción" >
                                        <div class="form-text">Seleccionar fecha y hora del fin de la promoción.
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div> 

                        </div>
                        <div class="row">
                            <div class="col-12 pb-3 pt-3">

                                <label class="form-label d-block">Etiquetas</label>
                                <?PHP foreach ($etiquetas as $e) {  
                                    
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="etiquetas[]" id="etiquetas_<?= $e->getId() ?>" value="<?= $e->getId() ?>"
                                        <?= in_array($e->getId(), $etiquetasSeleccionadas) ? "checked" : "" ?>
                                        >
                                        <label class="form-check-label mb-2" for="etiquetas_<?= $e->getId() ?>"><?= $e->getNombre_etiqueta() ?></label>
                                    </div>
                                <?PHP } ?>

                            </div>
                        </div>
                    </div>
            </div>


            <button type="submit" class="btn btn-grey-white">Editar</button>

            </form>
        </div>
    </div>
    </div>
</section>

<script>
    function ocultarMostrarTarjeta(){
        let divPromocion = document.getElementById("esConPromocion");
        let checkPromocion = document.getElementById("promocion");
        if (checkPromocion.checked) {
            divPromocion.style.display = 'block';
        } else {
            divPromocion.style.display = 'none';
        }
        
    }
</script>