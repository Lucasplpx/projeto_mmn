<?php
session_start();

require 'connection.php';
require 'funcoes.php';

if (empty($_SESSION['mmnlogin'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $pdo->prepare("SELECT user.nome, pat.nome as pnome FROM usuarios user 
LEFT JOIN patentes pat ON pat.id = user.patente
WHERE user.id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() > 0){
    $sql = $sql->fetch();
    $nome = $sql['nome'];
    $pnome = $sql['pnome'];
}else{
    header("Location: login.php");
    exit;
}

$lista = listar($id , $limite);

?>
<h1>Sistema de Marketing Multinivel</h1>
<h2>Usuário logado: <?php echo $nome.' ('.$pnome.')'; ?></h2>

<a href="cadastro.php">Cadastrar novo usuário</a>
<a href="sair.php">Sair</a>

<hr/>

<h4>Lista de cadastros</h4>

<?php exibir($lista); ?>