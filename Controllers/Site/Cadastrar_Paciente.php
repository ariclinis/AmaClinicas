<?php

include_once '../ligar_bd.php';
include_once '../../Geral/Pessoa.php';
include_once '../Gestao_Pacientes/Paciente.php';
include_once '../../Geral/Contacto.php';
session_start();

$user = $_SESSION['cod'];
$pessoa = new Pessoa();
$paciente = new Paciente();
$contacto = new Contacto();

$pdo = ligar::Chamar_bd();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$user");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$Cod_Filiar = $Linha['Cod_Filiar_Clinica'];
try {
    $pessoa->setNome(filter_input(INPUT_POST, 'nome'));
    $pessoa->setNome_pai(filter_input(INPUT_POST, 'nomepai'));
    $pessoa->setNome_mae(filter_input(INPUT_POST, 'nomemae'));
    $pessoa->setN_bi(filter_input(INPUT_POST, 'bi'));
    $pessoa->setData_nasc(filter_input(INPUT_POST, 'datanasc'));
    $ano_p = filter_input(INPUT_POST, 'datanasc');
    $pessoa->setIdade(2017 - substr("$ano_p", 0, 4));
    $pessoa->setGenero(filter_input(INPUT_POST, 'genero'));
    $pessoa->setAltura(' ');
    $pessoa->setNacionalidade(filter_input(INPUT_POST, 'nacio'));
    $ano=date("Y");
    $mes=date("m");
    $dia=date("d");
    $data_Actual_sistema = $dia."/".$mes."/".$ano;
    $pessoa->setData_registo($data_Actual_sistema);
    $pessoa->setEstado_civil(' ');
    $pessoa->setCod_provincia_nasc(' ');
    $pessoa->setCod_municipio_nasc(' ');
    $pessoa->setCod_Dir($Dir);
        

    //// Contacto 
    $contacto->setEmail(' ');
    $contacto->setFax(' ');
    $contacto->setTelefone(filter_input(INPUT_POST, 'phone'));


    $pessoa->setCod_Filiar_Clinica(filter_input(INPUT_POST, $Cod_Filiar))

    /////////////////////////////
    $pessoa->setCod_Bairro(filter_input(INPUT_POST, 'morada'));
    $pessoa->setProvincia_localidade(filter_input(INPUT_POST,'provloca'));
    $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST,'muniloca'));

    
    $paciente->setObs(filter_input(INPUT_POST, 'obs'));
    $paciente->setCod_utilizador($user);


    
    $pessoa->setCod_Contacto($contacto->inserir_contacto(ligar::Chamar_bd()));
    $paciente->setCod_pessoa($pessoa->inserir_pessoa(ligar::Chamar_bd()));
    $paciente->setCod_paciente($paciente->inserir_Paciente(ligar::Chamar_bd()));
    if($paciente->getCod_paciente()>0){
        echo 'sucesso';
    }
    
    //echo '<script type = "text/javascript">alert("Paciente inserido com sucesso");location.href="../Paciente_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



