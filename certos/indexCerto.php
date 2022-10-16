<?php

include_once 'servHelper.php';
include_once 'deparHelper.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Servidores</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
    <body>

<h1>Cadastrar Servidor</h1>

<legend>Formulário de cadastro</legend>
        <form name="formCad" method="POST" action="servHelper.php" target="_self" onsubmit="return adicionarDados()">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cadastrarservidor">
                <legend>Dados Pessoais</legend>
                <label for="nome">Nome: </label>
                <input size="40" placeholder="Digite aqui seu nome" name="nome" id="nome" type="text">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <label for="telefone">Telefone: </label>
                <input type="tel" name="telefone" id="telefone">
                <label for="cpf">CPF: </label>
                <input type="cpf" name="cpf" id="cpf">
            </fieldset>
            <fieldset>
                <legend>Informações acadêmicas</legend>
                <label for="depars">Departamento:</label>
                <select name="depar" id="depars">
            <?php
                $derpars = getDepars();
                    foreach($depars as $depar){
                        echo ' <option value="'.$depar->id_area.'">'.$depar->depar.'</option>';
                    }
                 
               ?>
                    </select>
            </fieldset>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>
    <div>
        <fieldset>
            <legend>Servidores Cadastrados</legend>
            <table id="servers">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Departamento</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php
                    $servidores = getServidores();
                    foreach($servidores as $al){
                        echo  '<tr>';
                        echo  '<td>'. $al->id .'</td>';
                        echo  '<td>'. $al->nome .'</td>';
                        echo  '<td>'. $al->email .'</td>';
                        echo  '<td>'. $al->cpf .'</td>';
                        echo  '<td>'. $al->depar .'</td>';
                        echo  '<td> <a style="color: black" href="editar_serv.php?id_servidor='.$al->id.'">Editar </a></td>';
                        echo  '<td> <a style="color: black" href="excluir_serv.php?id_servidor='.$al->id.'">Excluir </a></td>';
                        echo  '</tr>';
                    }
                ?>
            </table>
        </fieldset>
    </div>
</body>

</html>