<?php

function listar($id, $limite){
    $lista = array();
    global $pdo;

    $sql = $pdo->prepare("SELECT user.id, user.id_pai, user.patente, 
    user.nome, pat.nome as pnome FROM usuarios user 
    LEFT JOIN patentes pat ON pat.id = user.patente
    WHERE user.id_pai = :id");

    $sql->bindValue(":id", $id);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($lista as $chave => $usuario){
            $lista[$chave]['filhos'] = array();

            if($limite > 0){
                $lista[$chave]['filhos'] = listar($usuario['id'], $limite-1);
            }
        }
        
    }

    return $lista;
}

function exibir($array){
 
    echo '<ul>';
    foreach ($array as $usuario) {
        echo '<li>';
        echo $usuario['nome'].' ('.count($usuario['filhos']).' cadastros diretos)'.'('.$usuario['pnome'].')';

        if(count($usuario['filhos']) > 0){
            exibir($usuario['filhos']);
        }

        echo '</li>';
    }
    echo '</ul>';

}


function calcular_cadastros($id, $limite){
    $lista = array();
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_pai = :id");

    $sql->bindValue(":id", $id);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

        $filhos = $sql->rowCount();

        foreach($lista as $chave => $usuario){
           
            if($limite > 0){
                $filhos += calcular_cadastros($usuario['id'], $limite-1);
            }
        }
        return $filhos;
    }

   
}

?>