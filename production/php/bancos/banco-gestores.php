<?php
function  buscaGestoresDepartamentos($conexao , $id_departamento){
    $query = "select  * from gestor_dep where id_departamento = $id_departamento";
    $resultado = mysqli_query($conexao, $query);
    $departamento = mysqli_fetch_assoc($resultado);
    return $departamento;

}

function  buscaGestorMacro($conexao , $id_macroprocesso){
    $query = "select  * from gestor_macro where id_macroprocesso = $id_macroprocesso";
    $resultado = mysqli_query($conexao, $query);
    $departamento = mysqli_fetch_assoc($resultado);
    return $departamento;

}