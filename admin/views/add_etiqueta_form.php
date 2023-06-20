<section>
    <div class="container">
        <div class="row">
            <div class="d-flex col-12 pt-lg-0 align-self-center">
                <div class="col-12 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Agregar nueva Etiqueta</h2>
                </div>

            </div>
            <div class="col-12 ">
                <form action="actions/add_etiqueta_act.php" class="row g-4" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="nombre_etiqueta" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_etiqueta" name="nombre_etiqueta" placeholder="Nombre de la etiqueta" required>
                            </div>
                            <div class="col-6">
                                <label for="icono_etiq" class="form-label">Subir ícono</label>
                                <input type="file" class="form-control" id="icono_etiq" name="icono_etiq">
                                <div class="form-text">Subir archivos en formato.png. de hasta 200 KB</div>
                            </div>
                        </div>
                    </div>
                    

                    <button type="submit" class="btn btn-grey-white">Agregar</button>

                </form>
            </div>
        </div>
    </div>
</section>