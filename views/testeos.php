<div class=" d-flex justify-content-center p-5">
    <div>



        <div class="container">

            <h1 class="text-center mb-5 fw-bold">Página de Testeo</h1>

            <div class="border rounded p-3 mb-4">

                <div class="row">


                    <div class="col-12 ">


                        <?PHP

                        echo "<p>Testeando usuarios y login</p>";

                        $usuario = (new Usuario())->usuario_x_username('jperez_dv');

                        echo "<pre>";
                        print_r($usuario);
                        echo "</pre>";

                        $password = "Password123";


                        if(password_verify($password, $usuario->getPassword())){
                            echo "<p>Password correcto! Victoria!</p>";
                        }else{
                            echo "<p>Password icorrecto! =(</p>";
                        }

                        ?>
                    </div>


                </div>

            </div>

        </div>
    </div>