<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoCargos.php");

$cargos = new GestaoCargos();
try {
    $codigo=filter_input(INPUT_POST, 'codigo');
    $descricao= filter_input(INPUT_POST, 'descricao');
    if (empty($codigo)||empty($descricao)) {
        echo "DadosCargosVazio";
    }else{
        $cargos->setCodigo($codigo);
        $cargos->setDescricao($descricao);
        $id_cargos= $cargos->inserir_cargo(Ligar::chamar_bd());
        if (empty($id_cargos)) {
            "erro";
        }else{
            "sucesso";
        }
    }

} catch (Exception $e) {

}