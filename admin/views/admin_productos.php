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
                    <a href="index.php?sec=add_categoria_form">
                        <div class="p-2 "><img src="./../img/iconos/icon-create.png" alt="agregar"></div>
                        <p style="color: #000;"><strong>Agregar nuevo <br> Producto</strong></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 ">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Foto</th>
                        <th scope="col">Texto alternativo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" width="40%">Descripción</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Material</th>
                        <th scope="col">Medidas</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Cuidado</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha inicio Prom.</th>
                        <th scope="col">Fecha fin Prom.</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($listaProductos as $p) { ?>
                        <tr class="align-middle">
                            <td><?= $p->getImagen() ?></td>
                            <td><?= $p->getAlt() ?></td>
                            <td><?= $p->getNombre_prod() ?></td>
                            <td><?= $p->getCategoria() ?></td>
                            <td><?= $p->getDescripcion() ?></td>
                            <td class="flex-column align-items-stretch">
                                <div class="p-2"><a href="index.php?sec=edit_categoria_form&id=<?= $p->getId() ?>" class="ps-3"><img src="./../img/iconos/icon-edit.png" alt="editar"></a></div>
                                <div class="p-2"><a href="" class="ps-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                <h1 class="h5 modal-title">Eliminar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que querés eliminar esta categoría?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="actions/delete_categoria_act.php?id=<?= $p->getId() ?>" class="btn btn-primary">Eliminar</a>
            </div>
        </div>
    </div>
</div>