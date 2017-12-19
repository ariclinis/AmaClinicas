<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/Pessoa.php");
include_once("../../../Controllers/Admin/Contacto.php");
include_once("../../../Controllers/Admin/GestaoPacientes.php");

$pessoa= new Pessoa();
$paciente = new GestaoPacientes();
$contacto = new Contacto();
try {
    $nome=filter_input(INPUT_POST, 'nome');
    $nome_pai= filter_input(INPUT_POST, 'nomepai');
    $nome_mae= filter_input(INPUT_POST, 'nomemae');
    $N_bi= filter_input(INPUT_POST, 'bi');
    $Data_nasc= filter_input(INPUT_POST, 'datanasc');
    $Genero= filter_input(INPUT_POST, 'genero');
    $Data_registo= date("Y-m-d H:i:s");
    $Nacionalidade= filter_input(INPUT_POST, 'nacio');
    $Obs= filter_input(INPUT_POST, 'obs');
    //informacois Adicionais
    $Provincia_localidade= filter_input(INPUT_POST, 'provloca');
    $Municipio_Localidade= filter_input(INPUT_POST, 'muniloca');
    $bairro= filter_input(INPUT_POST, 'bairro');
    $telefone= filter_input(INPUT_POST, 'phone');
    $email= filter_input(INPUT_POST, 'email');
    $idUser= $_SESSION['cod'];
    $filiar_clinica= $_SESSION['id_clinicaFiliar'];
    if (empty($nome)||empty($nome_pai)||empty($nome_mae)||empty($N_bi)||empty($Genero)||empty($Data_nasc)||empty($Nacionalidade)) {
        echo "DadosPessoaisVazio";
    }elseif (empty($Obs)) {
        echo "InformacoesAdicionaisVazio";
    }elseif (empty($Provincia_localidade)||empty($Municipio_Localidade)||empty($bairro)||empty($telefone)||empty($email)) {
        echo "ContactosVazio";
    }else{
        $contacto->setEmail($email);
        $contacto->setTelefone($telefone);
        $id_contacto= $contacto->inserir_contacto(Ligar::chamar_bd());
        $pessoa->setNome($nome);
        $pessoa->setNome_pai($nome_pai);
        $pessoa->setNome_mae($nome_mae);
        $pessoa->setN_bi($N_bi);
        $pessoa->setData_nasc($Data_nasc);
        $pessoa->setGenero($Genero);
        $pessoa->setData_registo(date('m-d-Y'));
        $pessoa->setNacionalidade($Nacionalidade);
        $pessoa->setIdade($pessoa->Calcular_idade($Data_nasc));
        $pessoa->setId_contacto($id_contacto);
        $pessoa->setId_bairro($bairro);
        $pessoa->setId_filiarClinica($filiar_clinica);
        $pessoa->setProvincia_localidade($Provincia_localidade);
        $pessoa->setMunicipio_Localidade($Municipio_Localidade);
        $id_pessoa= $pessoa->inserir_pessoa(Ligar::chamar_bd());
        $paciente->setObs($Obs);
        $paciente->setId_pessoa($id_pessoa);
        $paciente->setId_utilizador($idUser);
        $id_paciente= $paciente->inserir_Paciente(Ligar::chamar_bd());
        if (empty($id_contacto)||empty($id_pessoa)||empty($id_paciente)) {
            "erro";
        }else{
            "sucesso";
        }
    }

} catch (Exception $e) {

}



