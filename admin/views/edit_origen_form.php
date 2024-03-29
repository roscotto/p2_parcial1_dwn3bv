<?PHP

$idPaisOrigen = $_GET['id'] ?? FALSE;

$paisOrigen = (new Origen())->get_x_id($idPaisOrigen);

?>


<section>
    <div class="container">
        <div class="row">
            <div class="d-flex col-12 pt-lg-0 align-self-center">
                <div class="col-12 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Editar País existente</h2>
                </div>

            </div>
            <div class="col-12 ">
                <form action="actions/edit_origen_act.php?id=<?= $paisOrigen->getId() ?>" class="row g-4" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoría" value="<?= $paisOrigen->getNombre() ?>" required>
                            </div>
                            <div class="col-6">
                                <label for="continente" class="form-label">Continente</label>
                                <input type="text" class="form-control" id="continente" name="continente" placeholder="Nombre del continente" value="<?= $paisOrigen->getContinente() ?>" required>

                            </div>
                        </div>
                       
                    </div>
                    

                    <button type="submit" class="btn btn-grey-white">Editar</button>

                </form>
            </div>
        </div>
    </div>
</section>