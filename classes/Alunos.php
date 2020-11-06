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

    public function inserir() {
        try {

            if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["sexo"]) && isset($_POST["endereco"]) && isset($_POST["tel"]) && isset($_POST["pass"]) ) {
                $this->nome = $_POST["name"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["tel"];
                $this->senha = $_POST["pass"];

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into ALUNOS(matricula,nome,sexo,email,endereco,telefone,senha) values(null,?,?,?,?,?,?)");

                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha
                ));

                if($sql->rowCount() > 0) {
                    header("location: index_alunos.php");
                } else {
                    header("location: index_alunos.php");
                }

            }

        } catch(PDOException $msg) {
            echo "Não foi possível inserir o aluno: ".$msg->getMessage();
        }
    }

    public function excluir($matricula) {
        try {
            if(isset($matricula)){
                $this->matricula = $matricula;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from alunos where matricula = ?");
                $sql->execute(array($this->matricula));

                if($sql->rowCount() > 0) {
                    header("location:index_alunos.php");
                }
            } else {
                header("location:index_alunos.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possível excluir os alunos: ".$msg->getMessage();
        }
    }

    public function alterar() {
        try{
            if(isset($_POST["Criar"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["sexo"]) && isset($_POST["endereco"]) && isset($_POST["tel"]) && isset($_POST["pass"])) {
                $this->nome = $_POST["name"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["tel"];
                $this->senha = $_POST["pass"];

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("update alunos set nome = ?, sexo = ?, email = ?, endereco = ?, telefone = ?, senha = ? where matricula = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha,
                    $this->matricula
                ));

                if($sql->rowCount() > 0) {
                    header("location:index_alunos.php");
                }
            } else {
                header("location:index_alunos.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possível alterar o aluno: ".$msg->getMessage();
        }
    }

    public function listarID($matricula) {
        try {
            if(isset($matricula)){
                $this->matricula = $matricula;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from alunos where matricula = ?");
                $sql->execute(array($this->matricula));

                if($sql->rowCount() > 0){
                    return $result = $sql->fetchObject();
                }
            }
        } catch (PDOException $msg) {
            echo "Não foi possível listar o aluno: ".$msg->getMessage();
        }
    }
}