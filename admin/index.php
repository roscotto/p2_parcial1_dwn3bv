<?PHP
require_once "../functions/autoload.php";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$seccionesValidas = [
    "dashboard" => [
        "titulo" => "Panel de Administración",
        "restringido" => true
    ],
    "admin_categorias" => [
        "titulo" => "Administración de Categorías",
        "restringido" => true
    ],
    "add_categoria_form" => [
        "titulo" => "Agregar nueva Categoría",
        "restringido" => true
    ],
    "edit_categoria_form" => [
        "titulo" => "Editar Categoría existente",
        "restringido" => true
    ],
    "delete_categoria_form" => [
        "titulo" => "Eliminar Categoría",
        "restringido" => true
    ],
    "admin_origen" => [
        "titulo" => "Administración de Categorías",
        "restringido" => true
    ],
    "add_origen_form" => [
        "titulo" => "Agregar nuevo País de Origen",
        "restringido" => true
    ],
    "edit_origen_form" => [
        "titulo" => "Editar País de Origen existente",
        "restringido" => true
    ],
    "delete_origen_form" => [
        "titulo" => "Eliminar País de Origen",
        "restringido" => true
    ],
    "admin_etiquetas" => [
        "titulo" => "Administración de Etiquetas",
        "restringido" => true
    ],
    "add_etiqueta_form" => [
        "titulo" => "Agregar nueva Etiqueta",
        "restringido" => true
    ],
    "edit_etiqueta_form" => [
        "titulo" => "Editar Etiqueta existente",
        "restringido" => true
    ],
    "delete_etiqueta_form" => [
        "titulo" => "Eliminar Etiqueta",
        "restringido" => true
    ],
    "admin_productos" => [
        "titulo" => "Administración de Productos",
        "restringido" => true
    ],
    "add_producto_form" => [
        "titulo" => "Agregar nuevo Producto",
        "restringido" => true
    ],
    "edit_producto_form" => [
        "titulo" => "Editar Producto existente",
        "restringido" => true
    ],
    "delete_producto_form" => [
        "titulo" => "Eliminar Producto",
        "restringido" => true
    ],
    "login" => [
        "titulo" => "Iniciar Sesión",
        "restringido" => false
    ],

    
];

$seccion = $_GET['sec'] ?? "dashboard";

//Busca que la seccion se encuentre dentro de las secciones válidas - especif. en la key
if (!array_key_exists($seccion, $seccionesValidas)) {
    $vista = "404";
    $titulo = "404 - Página no encontrada";
} else {
    $vista = $seccion;

    if ($seccionesValidas[$seccion]['restringido']) {
        (new Autenticacion())->check_login();
    }

    $titulo = $seccionesValidas[$seccion]['titulo'];
}

$datosUsuarioLogueado = $_SESSION['usuarioLogueado'] ?? FALSE;

$usuarioSinPermisos = (new Autenticacion())->check_admin();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhara :: <?= $titulo ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@400;700;800&family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/styles.css">

</head>


<body>
    <nav class="navbar navbar-expand-lg bg-grey text-light ">
        <div class="container-xl container-fluid ">
            <div class="align-self-start ">
                <a class="navbar-brand mt-2 p-2 d-flex" href="index.php?sec=dashboard">
                    <h1 class="h3 text-light">Panel de Administración</h1>
                </a>
            </div>

            <div class="align-self-end d-flex ">
                <div>
                    <button class="navbar-toggler p-3 mt-2 ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon navbar-dark"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end text-end p-2" id="navbarNavAltMarkup">
                        <div class="navbar-nav ">
                            <li class="nav-item mt-1 ms-2">
                                <a class="nav-link active text-light <?= $usuarioSinPermisos ? "d-none" : "" ?>" aria-current="page" href="index.php?sec=dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item mt-1 ms-2">
                                <a class="nav-link active text-light <?= $usuarioSinPermisos ? "d-none" : ""  ?>" aria-current="page" href="index.php?sec=admin_productos">Administrar Productos</a>
                            </li>
                            <li class="nav-item mt-1 ms-2">
                                <a class="nav-link active text-light <?= $usuarioSinPermisos ? "d-none" : ""  ?>" aria-current="page" href="index.php?sec=admin_categorias">Administrar Categorías</a>
                            </li>
                            <li class="nav-item mt-1 ms-2">
                                <a class="nav-link active text-light <?= $usuarioSinPermisos ? "d-none" : ""  ?>" aria-current="page" href="index.php?sec=admin_origen">Administrar Origen</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link active text-light <?= $usuarioSinPermisos ? "d-none" : ""  ?>" aria-current="page" href="index.php?sec=admin_etiquetas">Administrar Etiquetas</a>
                            </li>

                            <li class="nav-item p-3">
                                <a class="nav-link text-dark bg-light rounded " href="../index.php">Volver al sitio web</a>
                            </li>
                            <li class="nav-item p-3">
                                <a class="nav-link text-dark bg-light rounded <?= $usuarioSinPermisos ? "d-none" : ""  ?>" href="index.php?sec=login">Login</a>
                            </li>
                            <li  class="nav-item">
                                <a class="nav-link active text-light <?= $usuarioSinPermisos ? "d-none" : ""  ?>" aria-current="page" href="actions/auth_logout.php"><img src="../img/iconos/icono-logout.png" alt="cerrar sesión"></a>
                            </li>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </nav>

    <header>

    </header>

    <main>

        <?PHP

        // Verificamos si el archivo existe, sino, redireccionamos al 404
        require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";

        ?>


    </main>




    <footer class="bg-grey py-lg-3 mt-5">
        <ul>
            <li><b>Comisión:</b> DWN3BV - Parcial 2</li>
            <li><b>Materia:</b> Programación II</li>
            <li><b>Prof:</b> Jorge Pérez</li>
        </ul>




    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
</body>

</html>