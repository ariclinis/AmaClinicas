<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoEspecialidades.php");

$especialidade = new GestaoEspecialidades();
try {
    $codigo='teste';
    $descricao= 'amor';
    //$codigo=filter_input(INPUT_POST, 'IdEspec');
    //$descricao= filter_input(INPUT_POST, 'DesEspe');
    if (empty($codigo)||empty($descricao)) {
        echo "DadosEspecialidadeVazio";
    }else{
        $especialidade->setCodigo($codigo);
        $especialidade->setDescricao($descricao);
        $id_especialidade= $especialidade->inserir_especialidade(Ligar::chamar_bd());
        if (empty($id_especialidade)) {
            "erro";
        }else{
            "sucesso";
        }
    }

} catch (Exception $e) {

}