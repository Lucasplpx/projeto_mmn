<?php
session_start();
require 'connection.php';

if(!empty($_POST['nome']) && !empty($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5($email);
    $id_pai = $_SESSION['mmnlogin'];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() == 0){
        $sql= $pdo->prepare("INSERT INTO usuarios (id_pai, nome, email, senha) 
        VALUES (:id_pai, :nome, :email, :senha)");
        $sql->bindValue(":id_pai", $id_pai);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        header("Location: index.php");
        exit;
    }else{
        echo 'Já existe este usuário cadastrado!';
    }

}

?>
<h2>Cadastrar novo usuário</h2>
<form method="post">
    Nome: </br>
    <input type="text" name="nome"/></br></br>
    E-mail: </br>
    <input type="email" name="email"/></br></br>

    <input type="submit" value="Cadastrar"/>
</form>