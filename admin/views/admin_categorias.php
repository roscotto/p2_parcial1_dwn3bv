<?PHP
$listaCategorias = (new Categoria())->listar_categorias();

?>


<section>
    <div class="container">
        <div class="d-flex col-12 pt-lg-0 align-self-center">
            <div class="col-9 p-2 p-lg-5 pb-md-0">
                <h2 class="p3 text-center mt-5">Administración de Categorías</h2>
            </div>
            <div class="col-3">
                <div class="d-flex text-center p-3 mt-4 align-items-center justify-content-center">
                    <a href="index.php?sec=add_categoria_form">
                        <div class="p-2 "><img src="./../img/iconos/icon-create.png" alt="agregar"></div>
                        <p style="color: #000;"><strong>Agregar nueva <br> Categoría</strong></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 ">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col" width="10%">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" width="40%">Descripción</th>
                        <th scope="col">Fecha de Lanzamiento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?PHP foreach ($listaCategorias as $c) { ?>
                    <tr class="align-middle">
                        <td ><?=$c->getId()?></td>
                        <td><?=$c->getNombre()?></td>
                        <td><?=$c->getDescripcion()?></td>
                        <td><?=$c->getFecha_lanzamiento()?></td>
                        <td class="flex-column align-items-stretch">
                            <div class="p-2"><a href="index.php?sec=edit_categoria_form&id=<?=$c->getId()?>" class="ps-3"><img src="./../img/iconos/icon-edit.png" alt="editar"></a></div>
                            <div class="p-2"><a href="#" class="ps-3"><img src="./../img/iconos/icon-delete.png" alt="eliminar"></a></div>
                        </td>
                        
                    </tr>


                   <?PHP } ?>
                </tbody>
            </table>
        </div>

    </div>
</section>