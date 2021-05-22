<?php

class Db
{

    private $config;
    private $conn;

    public function __construct($config_file)
    {

        if (!file_exists($config_file))
            exit('ERRO: Arquivo de configuração não encontrado.');
        elseif (file_get_contents($config_file) == '')
            exit('ERRO: Arquivo de configuração vazio.');
        else
            $this->config = parse_ini_file($config_file);

        $this->db_connect();
    }

    public function db_connect()
    {

        @$conn = new mysqli(
            $this->config['server'],
            $this->config['user'],
            $this->config['password'],
            $this->config['database']
        );

        if ($conn->connect_error)
            die("Falha na conexão com o database: " . $conn->connect_error . ".");
        else
            $this->conn = $conn;
    }

    public function dbquery($sql)
    {

        $sql = mysqli_real_escape_string($this->conn, $sql);
        return $this->conn->query($sql);
    }
}

// // Teste unitário
// $conn = new Db('../_config.ini');
// $res = $conn->dbquery("SELECT * FROM config");

// while ($c = $res->fetch_assoc()) {
//     print_r($c);
// }
