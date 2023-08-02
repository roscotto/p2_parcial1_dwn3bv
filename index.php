<?PHP
require_once "functions/autoload.php";


$botonesCategorias = (new Categoria())->listar_categorias();

$carrito = new Carrito();
$totalProductos = $carrito->cantidad_total_productos();

// echo "<pre>";
// print_r($botonesCategorias);
// echo "</pre>";

$seccionesValidas = [
    "home" => [
        "titulo" => "Bienvenidos",
        "restringido" => false
    ],
    "nosotros" => [
        "titulo" => "Nosotros",
        "restringido" => false
    ],
    "tienda" => [
        "titulo" => "Nuestro catálogo",
        "restringido" => false
    ],
    "preg_frecuentes" => [
        "titulo" => "Preguntas frecuentes",
        "restringido" => false
    ],
    "contacto" => [
        "titulo" => "Contacto",
        "restringido" => false
    ],
    "detalle_prod" => [
        "titulo" => "Detalle de producto",
        "restringido" => false
    ],
    "datos_alumnos" => [
        "titulo" => "Alumnos",
        "restringido" => false
    ],
    "catalogo_completo" => [
        "titulo" => "Catálogo completo",
        "restringido" => false
    ],
    "testeos" => [
        "titulo" => "Página de pruebas",
        "restringido" => false
    ],
    "resultado_busqueda" => [
        "titulo" => "Resultado de búsqueda",
        "restringido" => false
    ],
    "form_process" => [
        "titulo" => "Respuesta enviada",
        "restringido" => false
    ],
    "carrito" => [
        "titulo" => "Carrito",
        "restringido" => false
    ],
    "checkout" => [
        "titulo" => "Checkout",
        "restringido" => true
    ],
    "login" => [
        "titulo" => "Iniciar Sesión",
        "restringido" => false
    ],
    "panel_usuario" => [
        "titulo" => "Panel de Usuario",
        "restringido" => true
    ]
];

//voy a pasar un parámetro que me va decir qué sección está cargando el sitio
//qué pasa si el usuario no me manda ninguna variable de GET por URL. Compruebo si la variable existe, si no existe, lo mando siempre al home
//ternario
//$seccion = isset($_GET['sec']) ? $_GET['sec'] : "home";

//null coalesce. Únicamente en PHP 7+
$seccion = $_GET['sec'] ?? "home";

//Busca que la seccion se encuentre dentro de las secciones válidas - especif. en la key
if (!array_key_exists($seccion, $seccionesValidas)) {
    $vista = "404";
    $titulo = "404 - Página no encontrada";
} else {
    $vista = $seccion;

    if ($seccionesValidas[$seccion]['restringido']) {
        (new Autenticacion())->check_login(FALSE);
    }

    $titulo = $seccionesValidas[$seccion]['titulo'];
}


$datosUsuarioLogueado = $_SESSION['usuarioLogueado'] ?? FALSE;

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
    <link rel="stylesheet" href="./css/styles.css">

</head>


<body>
    <div class="navbar navbar-expand-lg bg-orange text-light ">
        <div class="container-xl container-fluid ">
            <div class="align-self-start ">
                <a class="navbar-brand mt-2 p-2 " href="index.php?sec=home">
                    <img src="./img/logo.png" alt="Logo Dhara" class="d-inline-block align-text-top m-2" id="logo">
                    <h1 class="d-none">Dhara</h1>
                </a>
            </div>
            <div>
            <div class="pe-3">
                    <form class="d-flex" role="search" action="actions/procesar_busqueda.php" method="get">
                        <input class="form-control me-2" type="search" aria-label="Search" name="q" placeholder="Buscar productos">
                        <button class="btn btn-light" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
            <div class="align-self-center d-flex ">
                <div class="navbar-nav ">
                    <div>
                        <a class="nav-link text-dark bg-light rounded mx-2" href="index.php?sec=login">Log In</a>
                    </div>
                    <div>
                        <a class="nav-link text-dark bg-light rounded mx-2" href="./admin/index.php?sec=login">Admin</a>
                    </div>


                </div>

                <div class="mt-3 mt-md-4 mt-lg-2 ">

                    <button type="button" class="btn text-light position-relative ">
                        <a href="index.php?sec=carrito">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="whitesmoke" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-white text-dark">
                                <?= $totalProductos ?>
                                <span class="visually-hidden">Productos en el carrito</span>
                            </span>
                        </a>
                    </button>
                </div>

            </div>
        </div>

    </div>
    </div>

    </div>

    <nav class="navbar navbar-expand-lg bg-orange text-light ">
        <div class="container-xl container-fluid justify-content-center">

            <div class="row">
                <button class="navbar-toggler p-3 mt-2 ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end text-end p-2" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        <li class="nav-item px-2 ">
                            <a class="nav-link active text-light" aria-current="page" href="index.php?sec=home">Inicio</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-light" href="index.php?sec=nosotros">Nosotros</a>
                        </li>
                        <li class="nav-item px-2 dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                            <ul class="dropdown-menu bg-orange">
                                <li><a class="dropdown-item text-light" href="index.php?sec=catalogo_completo">Catálogo completo</a></li>

                                <?PHP foreach ($botonesCategorias as $categoria) { ?>
                                    <li><a class="dropdown-item text-light" href="index.php?sec=tienda&cat=<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></a></li>
                                <?PHP } ?>
                            </ul>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link text-light" href="index.php?sec=preg_frecuentes">FAQ's</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-light" href="index.php?sec=datos_alumnos">Alumnos</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-light" href="index.php?sec=contacto">Contacto</a>
                        </li>
                        <li class="nav-item px-2 dropdown <?= $datosUsuarioLogueado ? "" : "d-none" ?>">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $datosUsuarioLogueado['nombre'] ?></a>
                            <ul class="dropdown-menu bg-orange">
                                <li><a class="dropdown-item text-light" href="index.php?sec=panel_usuario">Panel de Usuario</a></li>
                                <li><a class="dropdown-item text-light" href="admin/actions/auth_logout.php?ref=front">Cerrar sesión</a></li>

                            </ul>
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




    <footer class="bg-grey py-lg-3 mt-5 pt-5">
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