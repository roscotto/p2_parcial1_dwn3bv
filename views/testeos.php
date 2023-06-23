<div class="container">

    <div class="row"></div>

    <div class="col-12">
        <h2>página de testeos</h2>

        <?PHP

        echo "<p> Testeando usuarios y login</p>";

        $usuario = (new Usuario())->encontrar_x_usuario('jperez_dv');

        echo "<pre>";
        print_r($usuario);
        echo "</pre>";

        $password = 'Password1234';

        if (password_verify($password, $usuario->getContrasena())) { //compara la contraseña que se está ingresando con la que está en la base de datos
            echo "Contraseña correcta";
        } else {
            echo "Contraseña incorrecta";
        }










        ?>


    </div>
</div>