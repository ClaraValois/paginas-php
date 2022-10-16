<?php
include_once 'serv.php';

    $id_servidor = filter_input(
        INPUT_GET,
        'id_servidor',
        FILTER_SANITIZE_NUMBER_INT
    );

    $servidor = Servidor::carregar($id_servidor);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Excluir servidor</title>
</head>
<body>

    <h1>Excluir Servidor</h1>

    <fieldset>
        <legend>Formulário de cadastro</legend>
        <form name="formCad" method="POST" action="index.php" target="_self" onsubmit="return adicionarDados()">
            <fieldset>
                <label for="id_servidor">Código</label>
                <input type="number" size="4" name="id_servidor" readonly id="id_servidor" value="<?php echo $servidor->id; ?>"><br>

                <input style="display: none" name="tipo" id="tipo" type="text" value="excluirservidor">
                <legend>Dados Pessoais</legend>
                <label for="nome">Nome: </label>

                <input size="40" readonly  style="cursor:not-allowed" placeholder="Digite aqui seu nome" name="nome" id="nome" type="text" value="<?php echo $servidor->nome;?>">

                <label for="email">Email:</label>
                <input type="email" readonly  style="cursor:not-allowed" id="email" name="email" value="<?php echo $servidor->email;?>">

                <label for="telefone">Telefone: </label>
                <input type="tel" readonly  style="cursor:not-allowed" name="telefone" id="telefone" value="<?php echo $servidor->telefone;?>">

                <label for="cpf">Telefone: </label>
                <input type="text" readonly  style="cursor:not-allowed" name="cpf" id="cpf" value="<?php echo $servidor->cpf;?>">
            </fieldset>

            <fieldset>
                <legend>Informações acadêmicas</legend>
                <label for="depars">Departamento:</label>
                <select name="depar" id="depars" readonly >
                    <option value="2">Administração</option>
                    <option value="1">Sistemas de Informação</option>
                </select>
            </fieldset>

            <fieldset>
                <input type="checkbox" id="excluir" value="excluir">
                <label for="excluir" id="label_excluir">Tenho ciência de que estou excluindo o registro de um servidor.</label>
                <input id="btn_excluir" disabled type="submit" value="Confirmar">
            </fieldset>

            <script>
                var checkbox = document.getElementById("excluir");
                var btn_excluir = document.getElementById("btn_excluir");

                checkbox.addEventListener('click', gereciarBotaoExcluir);

                function gereciarBotaoExcluir(){
                    if (checkbox.checked){
                        btn_excluir.disabled = false;
                    }else{
                        btn_excluir.disabled = true;
                    }
                }

            </script>
        </form>
    </fieldset>
</body>
</html>