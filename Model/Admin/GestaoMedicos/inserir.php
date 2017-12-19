<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/Pessoa.php");
include_once("../../../Controllers/Admin/Contacto.php");
include_once("../../../Controllers/Admin/GestaoMedicos.php");

$pessoa= new Pessoa();
$doctor = new GestaoMedicos();
$contacto = new Contacto();


try {
$Data_nasc= filter_input(INPUT_POST, 'datanasc');
$idUser= $_SESSION['cod'];
$filiar_clinica= $_SESSION['id_clinicaFiliar'];
    
        $contacto->setEmail(filter_input(INPUT_POST, 'email'));
        $contacto->setTelefone(filter_input(INPUT_POST, 'phone'));
        $id_contacto= $contacto->inserir_contacto(Ligar::chamar_bd());
        
        $pessoa->setNome(filter_input(INPUT_POST, 'nome'));
        $pessoa->setNome_pai(filter_input(INPUT_POST, 'nomepai'));
        $pessoa->setNome_mae(filter_input(INPUT_POST, 'nomemae'));
        $pessoa->setN_bi(filter_input(INPUT_POST, 'bi'));
        $pessoa->setData_nasc(filter_input(INPUT_POST, 'datanasc'));
        $pessoa->setGenero(filter_input(INPUT_POST, 'genero'));
        $pessoa->setData_registo(date('m-d-Y'));
        $pessoa->setNacionalidade(filter_input(INPUT_POST, 'nacio'));
        $pessoa->setIdade($pessoa->Calcular_idade($Data_nasc));
        $pessoa->setId_contacto($id_contacto);
        $pessoa->setId_bairro(filter_input(INPUT_POST, 'bairro'));
        $pessoa->setId_filiarClinica($filiar_clinica);
        $pessoa->setProvincia_localidade(filter_input(INPUT_POST, 'provloca'));
        $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST, 'muniloca'));
        
        $idPessoa = $pessoa->inserir_pessoa(Ligar::chamar_bd());
       
//        $especial =  filter_input(INPUT_POST, 'espe');
//        $doctor->setIdEspecialidade(filter_input(INPUT_POST, 'espe'));
       
        $OBSERVAR=  filter_input(INPUT_POST, 'obsserva');
        $doctor->setObs($OBSERVAR);
        $doctor->setIdEspecialidade(intval(filter_input(INPUT_POST, 'especialidade')));
        $doctor->setIdUtilizador($idUser);
        $doctor->setIdpessoa($idPessoa);
        $doctor->setIdfuncionario(1);
        $id_doctor=$doctor->inserir_doctor(Ligar::chamar_bd());
        
        if ($idPessoa>0 && $id_doctor>0){
            echo "sucesso";
        }else{
            echo "erro";
        }
        
    } catch (Exception $e) {
}



