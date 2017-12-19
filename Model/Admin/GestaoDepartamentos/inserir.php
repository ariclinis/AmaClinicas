<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoDepartamentos.php");

$departamento = new GestaoDepartamentos();
try {
    $codigo=filter_input(INPUT_POST, 'codigo');
    $descricao= filter_input(INPUT_POST, 'descricao');
    if (empty($codigo)||empty($descricao)) {
        echo "DadosDepartamentoVazio";
    }else{
        $departamento->setCodigo($codigo);
        $departamento->setDescricao($descricao);
        $id_departamento= $departamento->inserir_departamento(Ligar::chamar_bd());
        if (empty($id_departamento)) {
            "erro";
        }else{
            "sucesso";
        }
    }

} catch (Exception $e) {

}