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

    private static function conectar()
    {

        try {
            //se hace referencia la definición de la clase y no a la instancia
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //configuramos el modo de error para que lance excepciones en versiones viejas de PHP <=7.0

        } catch (Exception $e) {

            die('Error al conectar con MySQL.'); // corta la ejecucion
        }
    }

    /**
     * Método que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {
        //si es la primera vez que se llama al método, se crea la conexión
        if (self::$db === null) {
            self::conectar();
        }
        //si ya existe una conexión, la devuelve (no crea una nueva)
        return self::$db;
    }
}
