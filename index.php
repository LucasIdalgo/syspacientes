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

    $nome=$_GET["nome"];
    $sobrenome=$_GET["sobrenome"];
    echo "O nome é: ".$nome." ".$sobrenome;
?>