<?PHP
//inicializo variables con los datos que necesito traer de la superglobal
$inputNombre = $_GET['inputNombre'];
$inputApellido = $_GET['inputApellido'];
$inputEmail = $_GET['inputEmail'];
$inputTelefono = $_GET['inputTelefono'];
$inputComentario = $_GET['inputComentario'];


//lo que elijo imprimir en pantalla para mostrar al usuario
echo "<pre>";
print_r("<div>
        <h2>Muchas gracias por tu mensaje!</h2>
            <p>Te contactaremos a la brevedad.</p>

            <h3>Estos son los datos que nos enviaste:</h3>
            <ul>
                <li><p>Nombre: $inputNombre </p></li>
                <li><p>Apellido: $inputApellido </p></li>
                <li><p>Email: $inputEmail </p></li>
                <li><p>Teléfono: $inputTelefono </p></li>
                <li><p>Comentario: $inputComentario </p></li>
            </ul>
     </div>");
echo "</pre>";
