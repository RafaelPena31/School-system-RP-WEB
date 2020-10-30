<?php

require_once "Conexao.php";
class Alunos
{
    public $matricula;
    public $nome;
    public $sexo;
    public $email;
    public $endereco;
    public $telefone;
    public $senha;

    public function listarTodos() {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from alunos");
            $sql->execute();
            if($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Não foi possível listar os alunos: ".$msg->getMessage();
        }
    }
}