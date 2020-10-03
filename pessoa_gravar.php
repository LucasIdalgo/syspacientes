<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $id_pessoa  = $_POST["inputIdPessoa"];
   $nome       = $_POST["inputNome"];
   $dataNasc   = $_POST["inputDataNasc"];
   $cep        = $_POST["inputCEP"];
   $endereco   = $_POST["inputEndereco"];
   $numero     = $_POST["inputNumero"];
   $comp       = $_POST["inputComp"];
   $cidade     = $_POST["inputCidade"];
   $estado     = $_POST["inputEstado"];
   $telefone   = $_POST["inputTelefone"];
   $celular    = $_POST["inputCelular"];
   $email      = $_POST["inputEmail"];
   
   //convertendo nome para maiusculo
   $nome = strtoupper($nome);
   
   if(strlen($id_pessoa) > 0){
      if($id_pessoa != 0){
         //atualizar
         $sql = "UPDATE pessoas SET 
                  nome='$nome', 
                  email='$email', 
                  endereco='$endereco',
                  numero= $numero,
                  complemento=$comp,
                  cidade='$cidade',
                  estado='$estado',
                  cep='$cep',
                  datanascimento='$dataNasc',
                  telefone='$telefone',
                  celular='$celular'
                 WHERE id = $id_pessoa";
      }else{
         //insert
         $sql = "INSERT INTO pessoas( nome, endereco, numero, complemento, cidade, estado, cep, datanascimento, 
         telefone, celular, email) VALUES('$nome', '$endereco', $numero, $comp, '$cidade', '$estado', '$cep',
                               '$dataNasc', '$telefone', '$celular', '$email')";
      }
      mysqli_query($conexao_bd, $sql);
   }else{
      //erro!
   }
   mysqli_close($conexao_bd);
   header("location:pessoa_list.php");
   
?>