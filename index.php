<?php
    //echo "Boa noite"
    //$con=mysqli_connect(
    //    "localhost",
    //    "root",
    //    "123456",
    //    "syspacientes"
    //);

    //if(!$con){
    //    echo("Error: ".php_eol);
    //    exit;
    //}
    //echo "Conectou!!";
    //echo "<br>";
    //echo "Informações do host: ".mysqli_get_host_info($con);

    //mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicons/favicon.ico">
    <title>Syspacientes</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="img/login.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Entre em sua conta</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">Lucas Idalgo &copy; 2018-2020</p>
    </form>
  </body>
</html>