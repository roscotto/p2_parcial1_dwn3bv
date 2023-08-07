<?PHP 

$idCategoria = $_GET['id'] ?? FALSE;

$categoria = (new Categoria())->get_x_id($idCategoria);

?>


<section>
    <div class="container">
        <div class="row">
            <div class="d-flex col-12 pt-lg-0 align-self-center">
                <div class="col-12 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Editar Categoría existente</h2>
                </div>
            
            </div>
            <div class="col-12 ">
                <form action="actions/edit_categoria_act.php?id=<?= $categoria->getId()?>" class="row g-4" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoría" value="<?= $categoria->getNombre()?>" required>
                            </div>
                            <div class="col-6">
                                <label for="f-lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                                <input type="datetime-local" class="form-control" id="f-lanzamiento" name="f-lanzamiento" placeholder="Nombre de la categoría" value="<?= $categoria->getFecha_lanzamiento()?>"required>
                                <div class="form-text">Seleccionar fecha y hora del momento de la carga.</div>
                            </div>
                        </div>
                    

                    </div>
                    <div class="col-12">
                        <div>
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción de la categoría"><?= $categoria->getDescripcion()?></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-grey-white">Editar</button>

                </form>
            </div>
        </div>
    </div>
</section>    