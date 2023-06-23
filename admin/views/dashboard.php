<?PHP 

$datosUsuario = $_SESSION['usuarioLogueado'];

echo "<pre>";
print_r($datosUsuario);
echo "</pre>";
?>

<section id="dashboard_admin">
    <div class="container">
        <div class="col-12 pt-lg-0 align-self-center">
            <div class="p-2 p-lg-5 pb-md-0">
                <h2 class="pb-md-3 pb-lg-3 text-center">¡Bienvenid@ <?= $datosUsuario['nombre']?> al Panel de Administración!</h2>


            </div>
        </div>

    </div>
</section>