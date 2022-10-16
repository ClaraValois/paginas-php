
<?php
include_once 'deparHelper.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Departamentos</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Cadastro de departamento do IFBA</h1>
    <fieldset>
        <legend>Formulário de cadastro</legend>
        <form name="formCad" method="POST" action="deparHelper.php" target="_self" onsubmit="return adicionarDados()">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cadastrar">
                <legend>Dados do departamento</legend>
                <label for="nome">Nome: </label>
                <input size="40" placeholder="Digite aqui o nome do departamento" name="nome" id="nome" type="text">
            <input type="reset" value="Limpar">
            <input type="submit" value="Cadastrar">

        </form>
    </fieldset>
  
</body>

</html>