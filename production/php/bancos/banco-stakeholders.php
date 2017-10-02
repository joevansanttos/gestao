<?php

function buscaStakeholderId($conexao, $id_stakeholder){
    $query = "select  * from stakeholders where id_stakeholder={$id_stakeholder}";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

?>