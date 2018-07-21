<?php
session_start();

require 'connection.php';
require 'funcoes.php';

if (empty($_SESSION['mmnlogin'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() > 0){
    $sql = $sql->fetch();
    $nome = $sql['nome'];
}else{
    header("Location: login.php");
    exit;
}

$lista = listar($id , $limite);

?>
<h1>Sistema de Marketing Multinivel</h1>
<h2>Usuário logado: <?php echo $nome; ?></h2>

<a href="cadastro.php">Cadastrar novo usuário</a>
<a href="sair.php">Sair</a>

<hr/>

<h4>Lista de cadastros</h4>

<?php exibir($lista); ?>