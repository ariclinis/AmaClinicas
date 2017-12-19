<?php

session_start();
include_once '../../../Config/ligar_bd.php';
include_once '../../../Controllers/Admin/GestaoUtilizadores.php';

$utilizador = new Utilizadores();
try {
    
    $filiar_clinica= $_SESSION['id_clinicaFiliar'];
    
    $utilizador->setNomeUser(filter_input(INPUT_POST, 'nomeutilizador'));
    $utilizador->setNomeLogin(filter_input(INPUT_POST, 'nomeentrar'));
    $utilizador->setSenha(filter_input(INPUT_POST, 'senhavalida'));
    $utilizador->setEstadoUser(filter_input(INPUT_POST, 'estado'));
    $utilizador->setPerfil_Acesso(filter_input(INPUT_POST, 'nivelacesso'));
    $utilizador->setIdClinicaAfiliar(intval($filiar_clinica));
    $utilizador->setIdClinicas(intval($filiar_clinica));
    $utilizador->setEstadoUser(filter_input(INPUT_POST, 'estado'));
    $utilizador->setDataRegisto(date("Y-m-d"));
    $utilizador->setDataUpdate(date("Y-m-d"));
    
    $idinserido=$utilizador->InserirUser(Ligar::chamar_bd());
    
    if($idinserido>0){
        echo "sucesso";
    }else{
        echo "erro";
    }
    
} catch (Exception $ex) {
    
}
