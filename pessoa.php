<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $_GET['idPessoa'];

   //recuperando dados da sessao
   $id_usuario   = $_SESSION["id_usuario"];
   $tipoAcesso   = $_SESSION["tipo_acesso"];    
   $nome_usuario = "";
   
   $sql = "SELECT nome FROM usuarios WHERE id = ".$id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }

   //verificar se o parametro de id de edição está vazio:   
   if(strlen($idPessoa)==0) 
      $idPessoa = 0;

   $nomePessoa     = "";
   $datanascPessoa = "";
   $cepPessoa      = "";
   $endPessoa      = "";
   $numeroPessoa   = "";
   $compPessoa     = "";
   $cidadePessoa   = "";
   $estadoPessoa   = '';
   $telefonePessoa = "";
   $celularPessoa  = "";
   $emailPessoa    = "";

   if($idPessoa != 0){
      $sql = "SELECT nome, datanascimento, cep, endereco, numero, complemento, cidade, estado, telefone, celular,
       email FROM pessoas WHERE idPessoa = " . $idPessoa;
      $resp = mysqli_query($conexao_bd, $sql);
      if($rows=mysqli_fetch_row($resp)){
         $nomePessoa     = $rows[0];      
         $datanascPessoa = $rows[1];
         $cepPessoa      = $rows[2];
         $endPessoa      = $rows[3];
         $numeroPessoa   = $rows[4];
         $compPessoa     = $rows[5];
         $cidadePessoa   = $rows[6];
         $estadoPessoa   = $rows[7];
         $telefonePessoa = $rows[8];
         $celularPessoa  = $rows[9];
         $emailPessoa    = $rows[10];
      }  
   }
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Editar pessoa</title>
   <link rel="icon" href="img/favicon/favicon2.ico">
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

   <script type="text/javascript">                
        $(document).ready(function(){
            $("#inputCEP").mask("00.000-000");
            $("#inputDataNasc").mask("00/00/0000");
        });
   </script> 
</head>
<body>
   <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#">SysPacientes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php 
            if($tipoAcesso != 3) {
            ?>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                  <a class="dropdown-item" href="pessoa_list.php">Cadastro de pessoas</a>
                  <a class="dropdown-item" href="usuario_list2.php">Cadastro de usuários</a>                
                  <a class="dropdown-item" href="#">Cadastro de pacientes</a>
                </div>
              </li>
            <?php
            }
            ?>
          </ul>  
          <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo($nome_usuario); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="minhaconta.php">Minha conta</a>
                <a class="dropdown-item" href="logout.php">Sair</a>                 
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <?php
         if($idPessoa != 0){
            echo("<h1>Editando a pessoa: $nomePessoa</h1>");
         }else{
            echo("<h1>Cadastro de nova pessoa:</h1>");
         }
        ?>
        <form
            method="post"
            action="pessoa_gravar.php"
            onsubmit="return validaTela()">
            
            <div class="form-group">
               <label for="inputNome">Nome da pessoa:</label>
               <input type="text" class="form-control" id="inputNome" 
                     name="inputNome" placeholder="Nome da pessoa" 
                     maxlength="100" required autofocus
                     value="<?php echo($nomePessoa);?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputDataNasc">Data de nascimento:</label>
               <input type="text" class="form-control" id="inputDataNasc" 
                     name="inputDataNasc" placeholder="Data de nascimento da pessoa" 
                     maxlength="10" required
                     value="<?php echo($datanascPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputCEP">CEP:</label>
               <input type="text" class="form-control" id="inputCEP" 
                     name="inputCEP" placeholder="CEP do endereco da pessoa"
                     maxlength="10"
                     value="<?php echo($cepPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputEndereco">Endereço:</label>
               <input type="text" class="form-control" id="inputEndereco" 
                     name="inputEndereco" placeholder="Endereco da pessoa" required
                     value="<?php echo($endPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputNumero">Numero da residência:</label>
               <input type="number" class="form-control" id="inputNumero" 
                     name="inputNumero" placeholder="Numero da residencia da pessoa" required
                     value="<?php echo($numeroPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputComp">Complemento do endereço:</label>
               <input type="text" class="form-control" id="inputComp" 
                     name="inputComp" placeholder="Complemento do endereço da pessoa"
                     value="<?php echo($compPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputCidade">Cidade:</label>
               <input type="text" class="form-control" id="inputCidade" 
                     name="inputCidade" placeholder="Cidade da pessoa" required
                     value="<?php echo($cidadePessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputEstado">Estado:</label>
               <input type="text" class="form-control" id="inputEstado" 
                     name="inputEstado" placeholder="Estado da pessoa" required
                     value="<?php echo($estadoPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputTelefone">Telfone:</label>
               <input type="text" class="form-control" id="inputTelefone" 
                     name="inputTelefone" placeholder="Telefone da pessoa"
                     maxlenght="10"
                     value="<?php echo($telefonePessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputCelular">Celular:</label>
               <input type="text" class="form-control" id="inputCelular" 
                     name="inputCelular" placeholder="Celular" 
                     maxlength="11" required
                     value="<?php echo($celularPessoa); ?>"
                     >
            </div> 
            <div class="form-group">
               <label for="inputEmail">E-mail:</label>
               <input type="email" class="form-control" id="inputEmail" 
                     name="inputEmail" placeholder="E-mail"
                     value="<?php echo($emailPessoa); ?>"
                     >
            </div>          
            <input type="hidden" id="inputIdPessoa" name="inputIdPessoa" value="<?php echo($idPessoa) ?>">
            <button type="submit" class="btn btn-success">Gravar</button>&nbsp;
            <a href="pessoa_list.php" class="btn btn-warning" role="button">Retornar</a>
         </form>
      </div>
    </div>



</body>
<?php
//encerrando a conexao com mysql
mysqli_close($conexao_bd);
?>
</html>