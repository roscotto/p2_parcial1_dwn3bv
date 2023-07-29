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
    public function borrar_producto($idProducto)
    {
        if (isset($_SESSION['carrito'][$idProducto])) {
            unset($_SESSION['carrito'][$idProducto]);
        }

    }



}