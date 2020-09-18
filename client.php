<?php 

class client {

    public function __construct()
    {
        $params = array('location' => 'http://localhost/pedidos-soap/server.php', 'uri' => 'urn://localhost/pedidos-soap/server.php', 'trace' => 1);
        
        $this->instance = new SoapClient(NULL, $params);    
    }

    public function getName($id_array) {
    
        return $this->instance->__soapCall('getCustomerName', $id_array);

    }

}

$client = new client;

?>