<?PHP

/**
 * Clase para proveer la conexion de PDO al proyecto
 */
class Conexion
{
    private const DB_SERVER = 'localhost'; // ó IP "127.0.0.1";
    //credenciales de la base de datos
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'dhara_ecommerce';

    //qué tipo de conexión tiene que hacer - data source name
    private const DB_DSN = 'mysql:host=' . self::DB_SERVER . ' ;dbname=' . self::DB_NAME . ';charset=utf8mb4';


    /** Propiedad de tipo PDO
     * @var PDO */
    private PDO $db;


    public function __construct()
    {
        try {
            $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS); // necesita variables para ser instanciada
            echo "Conexión exitosa";
        } catch (Exception $e) { //agarro la exception
            //bloque con detalle de error
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            echo "<p>El error se generó en el siguiente archivo:</p>";
            echo $e->getFile();
            echo "<p>El error se generó en la siguiente línea:</p>";
            echo $e->getLine();
            echo "<p>El error es el siguiente:</p>";
            echo $e->getMessage();

            die('Error al conectar con MySQL'); // corta la ejecucion del programa
        }
    }


    /**
     * Método que devuelve una conexion PDO lista para usar
     * @return PDO
     */ 
    public function getConexion(): PDO
    {
        return $this->db;
    }
}




