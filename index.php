<?php
    //echo "Boa noite"
    $con=mysqli_connect(
        "localhost",
        "root",
        "123456",
        "syspacientes"
    );

    if(!$con){
        echo("Error: ".php_eol);
        exit;
    }
    echo "Conectou!!";
    echo "<br>";
    echo "Informações do host: ".mysql_get_host_info($con);

    mysqli_close($con);
?>