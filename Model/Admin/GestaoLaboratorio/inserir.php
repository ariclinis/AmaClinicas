<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/MarcarAnalise.php");

$analisemarcar = new MarcarAnalise();

try {
    $idUser= $_SESSION['cod'];
    $filiar_clinica= $_SESSION['id_clinicaFiliar'];
    $analisemarcar->setCod_Paciente(intval(filter_input(INPUT_POST, 'paciente')));
    $analisemarcar->setSitua(filter_input(INPUT_POST, 'situa'));
    $analisemarcar->setDataAnalise(filter_input(INPUT_POST, 'data_analise'));
    $analisemarcar->setId_User(intval($idUser));
    $analisemarcar->setId_Filiar(intval($filiar_clinica));
	//$analise = filter_input(INPUT_POST, 'analise');
    
    $analise = $_POST['analise'];

    $count =count($analise);
    if ($count <1) {
        echo 'analise_fazia';
    }else{
        $idAnaliseConsulta=intval($analisemarcar->inserir_analise_marcar(Ligar::chamar_bd()));
        $i=0;
     while ($i < $count) {
            $analise_insert=$analise[$i];
            $analisemarcar->setIdAnalise(intval($analise_insert));
            $analisemarcar->setIdAnaliseConsulta(intval($idAnaliseConsulta));
            $id_conultMarcada = $analisemarcar->inserir_analises_paciente(Ligar::chamar_bd());
            
            $Numero_Consulta= date('Y').date('m')."00".$idAnaliseConsulta;
            $analisemarcar->setN_consulta($Numero_Consulta);
            $i+=1;
        }

    //$id_consultaanalise=1;

    //$analisemarcar->setIdconsultaAnalise($id_consultaanalise);
    //echo count($analise);
        if(empty($id_conultMarcada) && empty($idAnaliseConsulta)) {
           echo 'erro';
        }else{
           echo 'sucesso';
        }

        }

    }catch (Exception $e) {

}