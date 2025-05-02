<?php
class MyDatabase {

    private $conection;
    public function __construct() {
        $config = parse_ini_file("config.ini");

        $this->conection = new MySqli(
            $config["host"],
            $config["user"],
            $config["pass"],
            $config["db"]
        );
    }

    public function query($sql)
    {
        $datos = $this->conection->query($sql);
        return $datos;
    }

    public function __destruct()
    {
        $this->conection->close();
    }
}



?>
