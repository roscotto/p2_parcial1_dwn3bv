<?PHP 

class Compra 
{
    private $id_compra;
    private $id_producto;
    private $cantidad;



/**
 * Método que lista todas las compras cargadas en la base de datos
 * @return Compra[] Un array de objetos Compra
 */
public function listar_compras() : array
{
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT compras.*, GROUP_CONCAT(productos_x_compra.id_producto) AS productos_adquiridos
    FROM compras
    LEFT JOIN productos_x_compra
    ON compras.id = productos_x_compra.id_compra GROUP BY compras.id;";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $listaCompras = $PDOStatement->fetchAll();

    return $listaCompras;
}

}