<?PHP 

class Carrito 
{
 
    


    /**
     * Método que agrega un producto al carrito
     * @param int $idProducto El id del producto a agregar
     * @param int $cantidad La cantidad de productos a agregar
     */
    public function agregar_producto(int $idProducto, int $cantidad)
    {
        $productoInfo = (new Producto()) -> producto_x_id($idProducto);

        if ($productoInfo) {
            $_SESSION['carrito'][$idProducto] = [ //agrega el producto al carrito
                "id" => $productoInfo->getId(),
                "imagen" => $productoInfo->getImagen(),
                "alt" => $productoInfo->getAlt(),
                "nombre" => $productoInfo->getNombre_prod(),
                "stock" => $productoInfo->getStock(),
                "precio" => $productoInfo->getPrecio(),
                "cantidad" => $cantidad
            ];
        
        }
    }


    /**
     * Método que lista los productos del carrito
     * @return array $productosCarrito Array con los productos del carrito o array vacío si no hay productos
    */
    public function listar_productos() :array
    {
        if(!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }

    }

    /**
     * Método que borra un producto del carrito
     * @param int $idProducto ID del producto a borrar
     */
    public function borrar_producto(int $idProducto)
    {
        if (isset($_SESSION['carrito'][$idProducto])) { //si está seteado, lo deseteo
            unset($_SESSION['carrito'][$idProducto]);
        }

    }


    /**
     * Método que vacía el carrito
     */
    public function vaciar_carrito()
    {
       $_SESSION['carrito'] = [];
    
    }


    /**
     * Método que actualiza las cantidades de los productos en el carrito
     * @param array $cantidades Array asociativo con los id de producto y las cantidades
     */
    public function actualizar_carrito(array $cantidades)
    {
        foreach($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }

    /**
     * Método que devuelve el precio total actual del carrito de compras
     */
    public function precio_total()
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $producto) {
                $total += $producto['precio'] * $producto['cantidad'];
            }
            return $total;
        }
    }


    /**
     * Método que devuelve la cantidad total de productos en el carrito
     */
    public function cantidad_total_productos()
    {
        $totalProductos = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $producto) {
                $totalProductos += $producto['cantidad'];
            }
            return $totalProductos;
        }
    }

}