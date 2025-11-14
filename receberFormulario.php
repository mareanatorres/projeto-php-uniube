<?php
    $nome = htmlspecialchars(string: $_POST['nome'] ?? '', flags: ENT_QUOTES, encoding: 'UTF-8');
    $email = htmlspecialchars(string: $_POST['email'] ?? '', flags: ENT_QUOTES, encoding: 'UTF-8');
    $telefone = htmlspecialchars(string: $_POST['telefone'] ?? '', flags: ENT_QUOTES, encoding: 'UTF-8');  

?>


<html>

  <body>
    <h1>Seu nome é: <?php echo $nome; ?> </h1>
    <p>Seu telefone é: <?php echo $telefone; ?> </p>
    <p>Seu email é: <?php echo $email; ?> </p>

  </body>

</html>