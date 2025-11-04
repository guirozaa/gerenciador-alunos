<?php
$host = "127.0.0.1";
$user = "root";
$password = "322133";
$data_base = "sistemaAlunos_bd";

class ConectaBanco
{
    var $host;
    var $user;
    var $password;
    var $db;
    var $conexao;

    function __construct($host, $user, $password, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    function conecta()
    {
        $this->conexao = @mysqli_connect($this->host, $this->user, $this->password, $this->db) or die("Falha: " . mysqli_connect_errno());
        return $this->conexao;
    }
}

$conexao = new ConectaBanco($host,  $user, $password, $data_base);
$conexao->conecta();
$conect = $conexao->conecta();
