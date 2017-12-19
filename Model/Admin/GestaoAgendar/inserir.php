<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoAgendar.php");

$agendar = new GestaoAgendar();


try {

    //PEGA OS VALORES ENVIADOS PELO HTML
    $idUser= $_SESSION['cod'];
    $filiar_clinica= $_SESSION['id_clinicaFiliar'];
    $especialidade=filter_input(INPUT_POST, 'especialidade');
    $medico=filter_input(INPUT_POST, 'medico');
    $hora=filter_input(INPUT_POST, 'hora');
    $data=filter_input(INPUT_POST, 'data_consulta');

    //VERIFICA SE OS CAMPOS ESTÃO VAZIOS
    if (empty($especialidade)||empty($data)||empty($medico)) {
        echo "campos_vazios";
    }
    else{
        //ENVIA OS DADOS PARA CLASS MARCAÇÃO DE CONSULTA

        $agendar->setId_Especialidade(filter_input(INPUT_POST, 'especialidade'));
        $agendar->setId_Medico(intval(filter_input(INPUT_POST, 'medico')));
        $agendar->setData_agenda(filter_input(INPUT_POST, 'data_consulta'));
        $agendar->setHora_inicio(filter_input(INPUT_POST, 'hora'));
        //$agendar->setHora_inicio($Hora);
        $agendar->setData_registo(date("d-m-Y"));
        $agendar->setId_Filiar_Clinica(intval($filiar_clinica));
        $agendar->setId_utilizador(intval($idUser));

        //RECEBE O VALOR RETORNADO PELA CLASSE DA FUNÇÃO inserir_consulta_paciente
        $id_agenda= $agendar->Inserir_agenda(Ligar::chamar_bd());

        //VERIFICA SE O VALOR RETORNADO CLASS É VÁLIDO
        if(empty($id_agenda)) {
           echo "erro";
        }else{
            if ($id_agenda>0) {
              echo  "success";
            }else{
              echo  "erro";
            }
        }
    }
} catch (Exception $e) {

}



