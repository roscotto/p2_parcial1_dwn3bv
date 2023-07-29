<?PHP
$carrito = new Carrito();
$productosCarrito = $carrito->listar_productos();

?>



<div class="row container mx-auto mt-4">
    <h2 class="text-center">Carrito</h2>

    <div>
        <?PHP if (count($productosCarrito)) { ?>
            <form action="../actions/update_prod_carrito_act.php" method="POST">
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
                        $total = 0;
                        foreach ($productosCarrito as $key => $producto) {
                            $subtotal = $producto['precio'] * $producto['cantidad'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td class="align-middle"><img src="./img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['alt'] ?>" class="img-fluid shadow-sm" width="100"></td>
                                <td class="align-middle"><?= $producto['nombre'] ?></td>
                                <td class="align-middle">$<?= number_format($producto['precio'], 2, ",", ".") ?></td>
                                <td class="align-middle" width="10%">
                                    <label for="cantidad_<?= $key ?>" class="vissually-hidden">Cantidad</label>
                                    <input type="number" name="<?= $producto['id'] ?>" id="<?= $producto['id'] ?>" value="<?= $producto['cantidad'] ?>" class="form-control">
                                </td>
                                <td class="align-middle">$<?= number_format($subtotal, 2, ",", ".") ?></td>
                                <td class="align-middle"><a href="actions/delete_prod_carrito_act.php?id=<?= $producto['id'] ?>" class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        <?PHP } ?>
                        <tr>
                            <td colspan="4" class="text-end">Total</td>
                            <td>$<?= number_format($total, 2, ",", ".") ?></td>
                            <td></td>
                        </tr>
                </table>
                <div class="row justify-content-end">
                    <div class="col-3">
                        <input type="submit" value="Actualizar carrito" class="btn btn-grey-white w-100">
                    </div>
                    <div class="col-3">
                        <a href="index.php?sec=tienda" class="btn btn-grey-white w-100">Seguir comprando</a>
                    </div>
                    <div class="col-3">
                        <a href="../actions/empty_carrito_act.php" class="btn btn-danger w-100">Vaciar carrito</a>
                    </div>
                    <div class="col-3">
                        <a href="#" class="btn btn-grey-white w-100">Finalizar compra</a>


            </form>
        <?PHP } else { ?>
            <h3 class="text-center">No hay productos en el carrito</h3>
            <a href="index.php?sec=tienda" class="btn btn-grey-white">Volver a la tienda</a>
        <?PHP } ?>





    </div>
</div>