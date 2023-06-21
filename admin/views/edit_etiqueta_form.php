<?PHP 

$idEtiqueta = $_GET['id'] ?? FALSE;
echo "<pre>";
print_r($idEtiqueta);
echo "</pre>";
$etiqueta = (new Etiqueta())->get_x_id($idEtiqueta);

echo "<pre>";
print_r($etiqueta);
echo "</pre>";
?>

<section>
    <div class="container">
        <div class="row">
            <div class="d-flex col-12 pt-lg-0 align-self-center">
                <div class="col-12 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Editar una Etiqueta existente</h2>
                </div>

            </div>
            <div class="col-12 ">
                <form action="actions/edit_etiqueta_act.php?id=<?= $idEtiqueta ?>" class="row g-4" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row">
                          
                            <div class="col-4">
                                <label for="icono-actual" class="form-label"> Ícono actual</label>
                                <br>
                                <img src="../img/etiquetas/<?= $etiqueta->getIcono_etiq()?>" alt="icono de la etiqueta <?= $etiqueta->getNombre_etiqueta()?>" class="img-fluid">
                                <input type="hidden" class="form-control" id="icono-actual" name="icono-actual" value="<?= $etiqueta->getIcono_etiq()?>">
                            </div>
                            <div class="col-4">
                                <label for="icono_etiq" class="form-label">Reemplazar ícono</label>
                                <input type="file" class="form-control" id="icono_etiq" name="icono_etiq">
                                <div class="form-text">Subir archivos en formato.png. de hasta 200 KB</div>
                            </div>
                            <div class="col-4">
                                <label for="nombre_etiqueta" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_etiqueta" name="nombre_etiqueta" placeholder="Nombre de la etiqueta" value="<?= $etiqueta->getNombre_etiqueta()?>" required >
                            </div>
                        </div>
                    </div>
                    

                    <button type="submit" class="btn btn-grey-white">Editar</button>

                </form>
            </div>
        </div>
    </div>
</section>