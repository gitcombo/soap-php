<?php 

class server {


    private $connection; 

    public function __construct(){
        
        $this->connection = (is_null($this->connection)) ? self::connect() : $this->connection;
        
    }

    static function connect() {
        
        $host = "dw-12345.postgres.database.azure.com"; 
        $port = "5432";
        $dbname = "postgres";
        $user = "web@dw-12345";
        $password = "Dw1234567890";

        $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
        
        echo "connection String";

        return  pg_connect($connection_string);

    }

    public function getCustomerName($id_array) {
    
        $id = $id_array['id'];
        $sql = "select nombre from public.clientes where id = '$id'";
        $query = pg_query($this->connection, $sql);
        $result = pg_fetch_assoc($query);
        
        return $result['nombre'];
    }

}

$params = array('uri' => 'localhost/pedidos-soap/server.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();

?>