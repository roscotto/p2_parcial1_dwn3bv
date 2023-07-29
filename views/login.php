<div class="container">
        <div class="row">
            <div class="d-flex col-12 pt-lg-0 align-self-center">
                <div class="col-12 p-2 p-lg-5 pb-md-0">
                    <h2 class="p3 text-center mt-5">Iniciar Sesión</h2>
                </div>

            </div>
            <div class="col-7 mx-auto mb-5">
                <form action="admin/actions/auth_login.php" class="row g-4" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="col-12">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="text" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div>
                                <?= (new Alerta())->mostrar_alertas() ?>
                            </div>
                            
                        </div>
                    </div>

                    <button type="submit" class="btn btn-grey-white">Login</button>

                </form>
            </div>
        </div>
    </div>