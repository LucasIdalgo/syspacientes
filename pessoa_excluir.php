<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $_GET['idPessoa'];

   //verifico se é vazio:
   if(strlen($idUsuario) > 0){
      $sql = "DELETE FROM pessoas WHERE id = " .$idPessoa;
      mysqli_query($conexao_bd, $sql);
   }else{
      //erro!
   }
   mysqli_close($conexao_bd);
   header("location:pessoa_list.php");
?>