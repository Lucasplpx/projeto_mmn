<?php
global $pdo;

$dns = "mysql:dbname=projeto_mmn;dbhost=localhost";
$user = "root";
$pass = "root";


try{
    $pdo = new PDO($dns, $user, $pass);
}catch(PDOException $er){
    echo 'Erro '.$er->getMessage();
    exit;
}

$limite = 3;

$patentes = array(
    
);
?>