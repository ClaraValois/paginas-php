

<?php

include_once 'banco.php';

class Servidor{
    public $id;
    public $nome;
    public $telefone;
    public $email;
    public $depar;
    public $cpf;
    public $id_area;


    function __construct($nome,$telefone,$email,$depar, $cpf){
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->depar = $depar;
        $this->cpf = $cpf;
        
    }
    function inserir(){
        $banco = new Banco();
        $conexao = $banco->conectar();
        try{
            $stmt = $conexao->prepare("INSERT INTO servidor (nome, id_area, telefone, email, cpf) VALUES (:nome,:id_area,:telefone,:email,:cpf)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':id_area', $this->depar);
            $stmt->bindParam(':telefone', $this->telefone);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->execute();

        } catch(PDOException $ex){
            echo "Erro ao inserir servidor: " . $ex;
        }
        
    }

    static function carregar($id_servidor){
        try{
            $banco = new Banco();
            $conexao = $banco->conectar();
            $stmt = $conexao->prepare("SELECT * FROM servidor WHERE id_servidor = :id_servidor");
            $stmt -> bindParam(':id_servidor', $id_servidor);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $servidor = null;
            foreach($stmt->fetchAll() as $v => $value){
                $servidor = new Servidor(
                    $value['nome'],
                    $value['telefone'],
                    $value['email'], 
                    $value['id_area'], 
                    $value['cpf']);
                    $servidor->id = $value['id_servidor'];
            }   
    
            return $servidor;
    
        }catch(PDOException $ex){
            echo 'Erro; ' . $ex->getMessage();
        }
    }
    
    function excluir(){
        $banco = new Banco();
        $conexao = $banco->conectar();
        try{
            $stmt = $conexao->prepare("DELETE FROM servidor WHERE id_servidor = :id_servidor");

            $stmt->bindParam(':id_servidor', $this->id);
            $stmt->execute();
        
        } catch(PDOException $ex){
            echo "Erro ao excluir servidor: " . $ex;
        }
    }
}