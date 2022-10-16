<?php

include_once "serv.php";

function excluir_servidor(){
        $id_servidor = $_POST["id_servidor"];
        $servidor = Servidor::carregar($id_servidor);
        $servidor->excluir();
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];

    if($tipo === 'cadastrarservidor'){
        cadastrar();
    }else if($tipo === "excluirservidor"){
        excluir_servidor();
    }

}

function cadastrar()
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $depar = $_POST['depar'];
    $telefone = $_POST['telefone'];

    $servidor = new Servidor($nome,$telefone,$email,$depar,$cpf);
   
    $servidor->inserir();
    header("Location:index.php");
}



function getServidores(){
    try{
        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * FROM servidor");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $servidores = array();
        foreach($stmt->fetchAll() as $v => $value){
            $servidor= new Servidor(
                $value['nome'],
                $value['telefone'],
                $value['email'], 
                $value['id_area'], 
                $value['cpf']);

            $servidor->id = $value['id_servidor'];
            array_push($servidores, $servidor);
        }

        return $servidores;

    }catch(PDOException $ex){
        echo 'Erro; ' . $ex->getMessage();
    }
}


