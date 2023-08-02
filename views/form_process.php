<?PHP
//inicializo variables con los datos que necesito traer de la superglobal
$inputNombre = $_POST['inputNombre'];
$inputApellido = $_POST['inputApellido'];
$inputEmail = $_POST['inputEmail'];
$inputTelefono = $_POST['inputTelefono'];
$inputComentario = $_POST['inputComentario'];

function soloNumeros($str){
    return preg_match('/^([^0-9]*)$/', $str);
}

function soloCaracteres($str){
    return preg_match('/^([^a-zA-Z]*)$/', $str);
}

function validarEmail($str){
    return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $str);
}

//lo que elijo imprimir en pantalla para mostrar al usuario
var_dump(soloNumeros($inputTelefono));
if (true){
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
}else{
    echo "<pre>";
    print_r("<div>
            <h2>Tu vieja en tanga</h2>
            ");
    echo "</pre>";
}
