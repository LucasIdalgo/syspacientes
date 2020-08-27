<?php
   require_once('variaveis.php');
   require_once('conexao.php');

   $id_usuario = $_GET["id_usuario"];
   $nome_usuario = "";

   $sql = "SELECT nome FROM usuarios WHERE id = " . $id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }
   mysqli_close($conexao_bd);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - ADM</title>
    <link rel="icon" href="img/favicon/favicon2.ico">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
   <?php
      echo "<span class=\"border border-dark\"><h3><b>Bem vindo: ". $nome_usuario . "</b></h3></span>";
   ?>
</body>
</html>