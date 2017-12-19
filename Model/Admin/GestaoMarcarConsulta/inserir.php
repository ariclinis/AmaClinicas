<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoMarcarConsulta.php");
session_start();
$marcar = new GestaoMarcarConsulta();
$pdo = Ligar::chamar_bd();


try {
    //PEGA OS VALORES ENVIADOS PELO HTML
        $idUser=$_SESSION['cod'];
        $filiar_clinica= $_SESSION['id_clinicaFiliar'];
         $paciente= filter_input(INPUT_POST, 'paciente');
        $especialidade= filter_input(INPUT_POST, 'especialidade');
        $data_consulta= filter_input(INPUT_POST, 'data_consulta');
        $medico=filter_input(INPUT_POST, 'medico');
        $peso= filter_input(INPUT_POST, 'peso');
        $Data_registo= date("Y-m-d");
        $situa=filter_input(INPUT_POST, 'situa');

    //VERIFICA SE OS CAMPOS ESTÃO VAZIOS
    if (empty($paciente)||empty($medico)||empty($especialidade)) {
        echo "obrigatorios";
    }else{

        //ENVIA OS DADOS PARA CLASS MARCAÇÃO DE CONSULTA
        $marcar->setId_utilizador($idUser);
        $marcar->setId_Filiar($filiar_clinica);
        $marcar->setId_paciente($paciente);
        $marcar->setTipo_Consulta($especialidade);
        $marcar->setId_Funcionario($medico);
        $marcar->setData_Consult($data_consulta);
        $marcar->setPeso_pac($peso);
        $marcar->setSitua($situa);
        //$marcar->setEstado_Consulta("Agendada");
        $marcar->setHora_Inicio(date("Y-m-d"));
        $marcar->setData_Registo($Data_registo);

        //RECEBE O VALOR RETORNADO PELA CLASSE DA FUNÇÃO inserir_consulta_paciente
        $id_consulta = $marcar->inserir_consulta_paciente(Ligar::chamar_bd());

        //VERIFICA SE O VALOR RETORNADO CLASS É VÁLIDO
        if(empty($id_consulta)){
            echo "erro_na_classe";
        }else{
            if ($id_consulta>0) {
                echo "sucess";
            }else{
                echo "erro";
            }
        }

}
}catch (Exception $e) {
    echo "problema";
}