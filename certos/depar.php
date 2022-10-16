<?php

include_once 'banco.php';

class Depar{
    public $id_area;
    public $depar;
   

    function __construct($depar){
        $this->depar= $depar;
        
        
    }
    function setId($id){
        $this->id_area = $id;
    }

    function inserir(){
        $banco = new Banco();
        $conexao = $banco->conectar();
        try{
            $stmt = $conexao->prepare("INSERT INTO area_depar (depar) VALUES (:depar)");
            $stmt->bindParam(':depar', $this->depar);
            $stmt->execute();

        } catch(PDOException $ex){
            echo "Erro " . $ex;
        }
    }
}
?>