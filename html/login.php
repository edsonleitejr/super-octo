<?php

include("config.php");
$nom = $_POST['usuario'];
$sen = $_POST['senha'];
try{
    $con = mysqli_connect("localhost", $user, $password, $database);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}
try {
    $verifica = mysqli_query($con, "SELECT * FROM client WHERE Email = '$nom' AND Password = '$sen';");
    if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');</script>";
        die();
    }else{
        header("Location:dash.html");
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}

?>
