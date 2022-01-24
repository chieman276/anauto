<?php
class db{
    public function connect()
    {
        $host_name = "localhost";
        $db_name = "shopcar";
        $username = "root";
        $password = "";
        $dsn = "mysql:host=$host_name;dbname=$db_name";
        
        try {
            $connect = new PDO($dsn,$username,$password);
            $connect->setAttribute(attribute:PDO::ATTR_ERRMODE, value:PDO::ERRMODE_EXCEPTION);

            return $connect;
    
        } catch (PDOException $e) {
            echo "ket noi that bai: " . $e->getMessage();
        }           
    }
}
?>
