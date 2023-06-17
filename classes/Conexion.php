<?PHP

class Conexion
{

    private const DB_SERVER = 'localhost'; // ó IP "127.0.0.1";
    //credenciales de la base de datos
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'dhara_ecommerce';

    //qué tipo de conexión tiene que hacer - data source name
    private const DB_DSN = 'mysql:host=' . self::DB_SERVER . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    /**
     * Propiedad de tipo PDO
     */
    private static ?PDO $db = null;
    //private function __construct()
    
    private static function conectar()
    {

        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            //echo "<p>Acabo de crear una conexion para poder traer datos! =D</p>";
        } catch (Exception $e) {

            //bloque con detalle de error
            // echo "<pre>";
            // print_r($e);
            // echo "</pre>";
            // echo "<p>El error se generó en el siguiente archivo:</p>";
            // echo $e->getFile();
            // echo "<p>El error se generó en la siguiente línea:</p>";
            // echo $e->getLine();
            // echo "<p>El error es el siguiente:</p>";
            // echo $e->getMessage();


            die('Error al conectar con MySQL.'); // corta la ejecucion
        }
    }

    /**
     * Método que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {

        if(self::$db === null){
            self::conectar();
        }
        return self::$db;
    }
}
