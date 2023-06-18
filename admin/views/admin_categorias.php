<?PHP 
$listaCategorias = (new Categoria())->listar_categorias();

?>


<section>
    <div class="container">
        <div class="col-12 pt-lg-0 align-self-center">
            <div class="p-2 p-lg-5 pb-md-0">
                <h2 class="pb-md-3 pb-lg-3">Administración de Categorías</h2>

            <?PHP 
            echo "<pre>";
            print_r($listaCategorias);
            echo "</pre>";
            ?>
            </div>
        </div>

    </div>
</section>