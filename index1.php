
<?php

include_once 'servHelper1.php';
include_once 'certos/deparHelper.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css" />
    <link rel="stylesheet" href="global.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro Servidores</title>
    <script src="script.js" defer></script>
  
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

          <div class="box">
            <<input size="40" placeholder="Digite aqui seu nome" name="nome" id="nome" type="text" required>
            <span>Nome completo</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" name="cpf" id="cpf" required >
            <span>Cpf</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" name="telefone" id="telefone" required >
            <span>Telefone</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" id="email" name="email" required >
            <span>E-mail</span>
            <i></i>
          </div>

          <div class="box">
          <input type="text" id="depars" name="depar" required >
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
            <input type="password" name="senha" id= "senha"required>
            <span>Senha</span>
            <i></i>
          </div>
          
          <div class="box">
          <span>Nível</span>
            <select name = "nivel" required>
              <option value = "Admin"> Administrador </option>
              <option value = "Servidor"> Servidor </option>
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
    