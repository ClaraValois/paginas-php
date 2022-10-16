<?php
include_once 'serv.php';
    $id_servidor = filter_input(
        INPUT_GET,
        'id_servidor',
        FILTER_SANITIZE_NUMBER_INT
    );

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar servidor</title>
</head>
<body>
    <h1>Editar servidor</h1>

    <fieldset>
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
                <input type="text" name="cpf" id="cpf">
            </fieldset>
            <fieldset>
                <legend>Informações acadêmicas</legend>
                <label for="depars">Departamento:</label>
                <select name="depar" id="depars">
                    <option value="2">Administração</option>
                    <option value="1">Sistemas de Informação</option>
                </select>
            </fieldset>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>

</body>
</html>