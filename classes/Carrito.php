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
                "precio" => $productoInfo->getPrecio(),
                "cantidad" => $cantidad
            ];
        
        }




    }





}