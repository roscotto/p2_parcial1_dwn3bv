<?PHP

$categorias = (new Categoria)->listar_categorias();
$paisesOrigen = (new Origen)->listar_origen();
$etiquetas = (new Etiqueta)->listar_etiquetas();

?>


<section>
    <div class="container">
        <div class="row">
            <div class="d-flex col-12 pt-lg-0 align-self-center">
                <div class="col-12 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Agregar nuevo Producto</h2>
                </div>

            </div>
            <div class="col-12 ">
                <form action="actions/add_producto_act.php" class="row g-4" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row pt-3">
                            <div class="col-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required>
                            </div>
                            <div class="col-4">
                                <label for="foto_prod" class="form-label">Subir foto</label>
                                <input type="file" class="form-control" id="foto_prod" name="foto_prod">
                                <div class="form-text">En formato .jpg o .png. de hasta 250 KB y 500x500px</div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="alt" class="form-label">Texto alternativo de la foto</label>
                                    <textarea class="form-control" id="alt" name="alt" rows="3" placeholder="Texto alternativo de la foto"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-3">
                                <label for="categoria_id" class="form-label">Categoría</label>
                                <select class="form-select" name="categoria_id" id="categoria_id" required>
                                    <option value="" selected disabled>Elegí una opción</option>
                                    <?PHP foreach ($categorias as $c) { ?>
                                        <option value="<?= $c->getId() ?>"><?= $c->getNombre() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="origen_id" class="form-label">País de Origen</label>
                                <select class="form-select" name="origen_id" id="origen_id" required>
                                    <option value="" selected disabled>Elegí una opción</option>
                                    <?PHP foreach ($paisesOrigen as $p) { ?>
                                        <option value="<?= $p->getId() ?>"><?= $p->getNombre() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="material" class="form-label">Material</label>
                                <input type="text" class="form-control" id="material" name="material" placeholder="Tipo de material" required>
                                <div class="form-text">Si posee más de uno, separarlos por comas.</div>
                            </div>
                            <div class="col-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-3">
                                <label for="medidas" class="form-label">Medidas</label>
                                <input type="text" class="form-control" id="medidas" name="medidas" placeholder="Medidas" required>
                                <div class="form-text">Expresadas en centímetros.</div>
                            </div>
                            <div class="col-3">

                                <label for="peso" class="form-label">Peso</label>
                                <input type="text" class="form-control" id="peso" name="peso" placeholder="peso" required>
                                <div class="form-text">Expresado en gramos.</div>

                            </div>
                            <div class="col-3">
                                <label for="cuidado" class="form-label">Cuidado</label>
                                <input type="text" class="form-control" id="cuidado" name="cuidado" placeholder="Cuidado del producto" required>

                            </div>
                            <div class="col-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" required>
                                <div class="form-text">Expresado con dos decimales.</div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-8">
                                <div>
                                    <label for="descripcion" class="form-label">Descripción del producto</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="inicio-promocion" class="form-label">Inicio Promoción</label>
                                <input type="datetime-local" class="form-control" id="inicio-promocion" name="inicio-promocion" placeholder="Fecha de inicio de promoción" required>
                                <div class="form-text">Seleccionar fecha y hora del inicio de la promoción.
                                </div>
                                <label for="fin-promocion" class="form-label">Fin Promoción</label>
                                <input type="datetime-local" class="form-control" id="fin-promocion" name="fin-promocion" placeholder="Fecha de fin de la promoción" required>
                                <div class="form-text">Seleccionar fecha y hora del fin de la promoción.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pb-3 pt-3">

                                <label class="form-label d-block">Etiquetas</label>
                                <?PHP foreach ($etiquetas as $e) {    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="etiquetas[]" id="etiquetas_<?= $e->getId() ?>" value="<?= $e->getId() ?>">
                                        <label class="form-check-label mb-2" for="etiquetas_<?= $e->getId() ?>"><?= $e->getNombre_etiqueta() ?></label>
                                    </div>
                                <?PHP } ?>

                            </div>
                        </div>
                    </div>
            </div>


            <button type="submit" class="btn btn-grey-white">Agregar</button>

            </form>
        </div>
    </div>
    </div>
</section>