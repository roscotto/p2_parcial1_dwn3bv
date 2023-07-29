<?PHP
$carrito = new Carrito();
$productosCarrito = $carrito->listar_productos();

?>



<div class="row container mx-auto mt-4">
    <h2 class="text-center mt-5 mb-4">Carrito</h2>

    <div>
        <?PHP if (count($productosCarrito)) { ?>
            <form action="actions/update_prod_carrito_act.php" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($productosCarrito as $key => $producto) {
                        $subtotal = $producto['precio'] * $producto['cantidad'];
  
                        ?>
                            <tr>
                                <td class="align-middle"><a href="index.php?sec=detalle_prod&id=<?= $key ?>"><img src="./img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['alt'] ?>" class="img-fluid shadow-sm" width="100"></a></td>
                                <td class="align-middle"><?= $producto['nombre'] ?></td>
                                <td class="align-middle">$<?= number_format($producto['precio'], 2, ",", ".") ?></td>
                                <td class="align-middle" width="10%">
                                    <label for="cantidad_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" name="cantidad[<?= $key ?>]" id="cantidad_<?= $key ?>" value="<?= $producto['cantidad'] ?>" class="form-control">
                                </td>
                                <td class="align-middle">$<?= number_format($subtotal, 2, ",", ".") ?></td>
                                <td class="align-middle"><a href="actions/delete_prod_carrito_act.php?id=<?= $producto['id'] ?>" class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        <?PHP } ?>
                        <tr>
                            <td colspan="4" class="text-end">Total</td>
                            <td>$<?= number_format($carrito->precio_total(), 2, ",", ".") ?></td>
                            <td></td>
                        </tr>
                </table>
                <div class="row justify-content-end mt-5 mb-5">
                    <div class="col-3">
                        <input type="submit" value="Actualizar carrito" class="btn btn-grey-white w-100">
                    </div>
                    <div class="col-3">
                        <a href="index.php?sec=catalogo_completo" class="btn btn-grey-white w-100">Seguir comprando</a>
                    </div>
                    <div class="col-3">
                        <a href="actions/empty_carrito_act.php" class="btn btn-danger w-100">Vaciar carrito</a>
                    </div>
                    <div class="col-3">
                        <a href="#" class="btn btn-grey-white w-100">Finalizar compra</a>


            </form>
        <?PHP } else { ?>
            <div class="d-flex flex-column row align-items-center">
                <div class="col-6 d-flex flex-column justify-content-center">
                    <h3 class="text-center">¡No hay productos en el carrito!</h3>
                    <img class="img-fluid d-block" src="./img/carrito-vacio.jpg" alt="ilustración de un carrito vacío y una mujer con cara triste">
                    <a href="index.php?sec=catalogo_completo" class="btn btn-grey-white mx-auto mt-5 mb-5">Volver a la tienda</a>
                </div>
            </div>
        <?PHP } ?>





    </div>
</div>