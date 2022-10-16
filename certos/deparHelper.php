<?php
include_once 'banco.php'; 
include_once 'depar.php';



if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];

    if($tipo === 'cadastrar'){
        cadastrarDepar();
    }
}

function cadastrarDepar(){
    $nome = $_POST['nome'];
 

    $depar = new Depar($nome);
    $depar->inserir();

    header("Location:index.php");
}
function getDepars(){
    try{
        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * FROM servidor");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $depars = array();
        foreach($stmt->fetchAll() as $v => $value){
            $depar= new Depar( $value['depar']);
            $depar->id = $value['id_area'];
            array_push($depars, $depar);
        }

        return $depars;

    }catch(PDOException $ex){
        echo 'Erro; ' . $ex->getMessage();
    }
}


?>