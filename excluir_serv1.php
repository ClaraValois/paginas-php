<?php
include_once 'serv1.php';

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Resources/Assets/Css/cadastro.css" />
    <link rel="stylesheet" href="/Resources/Assets/Css/global.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro Servidores</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="cadastro.css">
  
</head>
    <body>
      <h1> Cadastrar Servidor</h1>
    <div class="tudo">
      <div class="bloco1">
      <form name="formCad" method="POST" action="servHelper.php" target="_self" onsubmit="return adicionarDados()">
          <ul class="title">
            <a href="/">
              <li>Login</li>
            </a>
            <a href="/cadastro">
              <li>Cadastro</li>
            </a>
          </ul>
          <input style="display: none" name="tipo" id="tipo" type="text" value="excluirservidor">
          <div class="box">
          <input type="number" size="4" name="id_servidor" readonly id="id_servidor" value="<?php echo $servidor->id; ?>"><br>
            <span>Código</span>
            <i></i>
          </div>

          <div class="box">
            <<input size="40" placeholder="Digite aqui seu nome" name="nome" id="nome" type="text" required  value="<?php echo $servidor->nome;?>">
            <span>Nome completo</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" name="cpf" id="cpf" required value="<?php echo $servidor->cpf;?>">
            <span>Cpf</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" name="telefone" id="telefone" required value="<?php echo $servidor->telefone;?>">
            <span>Telefone</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" id="email" name="email" required  value="<?php echo $servidor->email;?>" >
            <span>E-mail</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" id="depars" name="depar" required  value="<?php echo $servidor->depar;?>">
            <span>Departamento</span>
            <select name="depar" id="depars">
            <?php
                $derpars = getDepars();
                    foreach($depars as $depar){
                        echo  '<tr>';
                        echo ' <option value="'.$depar->id_area.'">'.$depar->depar.'</option>';
                    }
                 
               ?>
                    </select>
            <i></i>
          </div>

          <div class="box">
            <input type="password" required  value="<?php echo $servidor->senha;?>" >
            <span>Senha</span>
            <i></i>
          </div>
        </form>
        <div class="submit">
          <button class="btn">Confirmar</button>
        </div>
        <div class="reset">
          <button class="btn">Limpar</button>
        </div>
      </div>
    </div>
  </body>
</html>
    