<?PHP
$listaProductos = (new Producto())->catalogo_completo();

?>


<section>
    <div class="container">
        <div class="d-flex col-12 pt-lg-0 align-self-center">
            <div class="col-9 p-2 p-lg-5 pb-md-0">
                <h2 class="p3 text-center mt-5">Administración de Productos</h2>
            </div>
            <div class="col-3">
                <div class="d-flex text-center p-3 mt-4 align-items-center justify-content-center">
                    <a href="index.php?sec=add_producto_form">
                        <div class="p-2 "><img src="./../img/iconos/icon-create.png" alt="agregar"></div>
                        <p style="color: #000;"><strong>Agregar nuevo <br> Producto</strong></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 ">
            <div>
                <?= (new Alerta())->mostrar_alertas() ?>
            </div>
            <div class="tarjeta-prod-admin col-12 ">
                <?PHP foreach ($listaProductos as $p) { ?>
                    <div class="row d-flex m-3 rounded p-3">
                        <div class="col-2 border border-2">
                            <div class="p-1">
                                <p class="h6"><b>Nombre:</b></p>
                                <p><?= $p->getNombre_prod() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Foto:</b></p>
                                <img src="../img/productos/<?= $p->getImagen() ?>" alt="Foto de<?= $p->getAlt() ?>" class="img-fluid rounded shadow-sm">
                            </div>


                        </div>
                        <div class="col-2 border border-2">
                            <div class="p-1">
                                <p><b>Texto alternativo:</b></p>
                                <p><?= $p->getAlt() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Categoría:</b></p>
                                <p><?= $p->getCategoria() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Orígen:</b></p>
                                <p><?= $p->getOrigen() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Material:</b></p>
                                <p><?= $p->getMaterial() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Medidas:</b></p>
                                <p><?= $p->getMedidas() ?></p>
                            </div>


                        </div>
                        <div class="col-4 border border-2">

                            <div class="p-1">
                                <p class="h6"><b>Peso:</b></p>
                                <p><?= $p->getPeso() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Descripción:</b></p>
                                <p><?= $p->getDescripcion() ?></p>
                            </div>
                            <div class="p-1">
                                <p class="h6"><b>Etiquetas:</b></p>
                                <?PHP

                                foreach ($p->getEtiquetas() as $e) {

                                ?>

                                    <div class="d-flex row">
                                        <div class="col-2"><img src="../img/etiquetas/<?= $e->getIcono_etiq() ?>" alt="Foto de<?= $p->getAlt() ?>" class="img-fluid rounded shadow-sm"></div>
                                        <div class="col-10">
                                            <p><?= $e->getNombre_etiqueta() ?></p>
                                        </div>
                                    </div>

                                <?PHP } ?>

                            </div>


                        </div>
                        <div class="col-3 border border-2">
                            <div class=" p-1">
                                <p class="h6"><b>Cuidado:</b></p>
                                <p><?= $p->getCuidado() ?></p>
                            </div>
                            <div class="p-1">
                                <p><b>Precio:</b></p>
                                <p><?= $p->getPrecio() ?></p>
                            </div>
                            <div class="p-1">
                                <p><b>Stock:</b></p>
                                <p><?= $p->getStock()  ?></p>
                            </div>
                            <div class="p-1">
                                <p><b>Producto en promoción:</b></p>
                                <p>Desde: <?= $p->getInicio_promocion() ?></p>
                                <p>Hasta: <?= $p->getFin_promocion() ?></p>
                            </div>

                        </div>
                        <div class="col-1 flex-column align-items-stretch border border-2">
                            <p><b>Acciones:</b></p>
                            <div class="p-2">
                                <a href="index.php?sec=edit_producto_form&id=<?= $p->getId() ?>" class="ps-3">
                                    <img src="./../img/iconos/icon-edit.png" alt="editar">
                                </a>
                            </div>
                            <div class="p-2">
                                <a href="#" class="ps-3" onclick="eliminarProducto(<?= $p->getId() ?>, event)">                                    
                                    <img src="./../img/iconos/icon-delete.png" alt="eliminar">
                                </a>
                            </div>
                        </div>
                    </div>


                <?PHP } ?>









                <td class="flex-column align-items-stretch">

                </td>




            </div>

        </div>

    </div>
</section>

<!-- Modal de confirmación (acción de eliminar)-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h5 modal-title">Eliminar Producto</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que querés eliminar este producto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="btnEliminarProducto" href="#" class="btn btn-primary">Eliminar</a>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal de confirmación (acción de eliminar)-->
<script>
    function eliminarProducto(id,e){
        e.preventDefault();
        let cartelModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {backdrop: 'static', keyboard: false});
        cartelModal.show();
        let btnEliminarProducto = document.getElementById("btnEliminarProducto")
        btnEliminarProducto.href = "actions/delete_producto_act.php?id="+id;
    }
</script>