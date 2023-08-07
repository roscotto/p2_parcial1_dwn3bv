<?PHP
$listaPaisesOrigen = (new Origen())->listar_origen();

?>


<section>
    <div class="container">
        <div class="d-flex col-12 pt-lg-0 align-self-center">
            <div class="col-9 p-2 p-lg-5 pb-md-0">
                <h2 class="p3 text-center mt-5">Administración de Países de Origen</h2>
            </div>
            <div class="col-3">
                <div class="d-flex text-center p-3 mt-4 align-items-center justify-content-center">
                    <a href="index.php?sec=add_origen_form">
                        <div class="p-2 "><img src="./../img/iconos/icon-create.png" alt="agregar"></div>
                        <p style="color: #000;"><strong>Agregar nuevo <br> País de Origen</strong></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 ">
            <div>
                <?= (new Alerta())->mostrar_alertas() ?>
            </div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col" width="10%">ID</th>
                        <th scope="col">Nombre País</th>
                        <th scope="col">Continente</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($listaPaisesOrigen as $c) { ?>
                        <tr class="align-middle">
                            <td><?= $c->getId() ?></td>
                            <td><?= $c->getNombre() ?></td>
                            <td><?= $c->getContinente() ?></td>
                            <td class="flex-column align-items-stretch">
                                <div class="p-2"><a href="index.php?sec=edit_origen_form&id=<?= $c->getId() ?>" class="ps-3"><img src="./../img/iconos/icon-edit.png" alt="editar"></a></div>
                                <div class="p-2"><a href="#" class="ps-3" onclick="eliminarOrigen(<?= $c->getId() ?>, event)">
                                        <img src="./../img/iconos/icon-delete.png" alt="eliminar"></a></div>
                            </td>

                        </tr>


                    <?PHP } ?>
                </tbody>
            </table>
        </div>

    </div>
</section>

<!-- Modal de confirmación (acción de eliminar)-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h5 modal-title">Eliminar País de Origen</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que querés eliminar este País?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="btnEliminarOrigen" href="#" class="btn btn-primary">Eliminar</a>
            </div>
        </div>
    </div>
</div>

<!-- Fin Modal de confirmación (acción de eliminar)-->
<script>
    function eliminarOrigen(id,e){
        e.preventDefault();
        let cartelModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {backdrop: 'static', keyboard: false});
        cartelModal.show();
        let btnEliminarOrigen = document.getElementById("btnEliminarOrigen")
        btnEliminarOrigen.href = "actions/delete_origen_act.php?id="+id;
    }
</script>