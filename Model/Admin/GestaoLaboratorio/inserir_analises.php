<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoAnalise.php");

$AnalisesConfig= new GestaoAnalise();



try{
       $idUser= $_SESSION['cod'];
       $filiar_clinica= $_SESSION['id_clinicaFiliar'];
       
	$AnalisesConfig->setCodigo(filter_input(INPUT_POST,'codanalise'));
	$AnalisesConfig->setDescricao(filter_input(INPUT_POST, 'des_canalise'));
        $AnalisesConfig->setEstad('Activo');
        $AnalisesConfig->setData_Registo(date('Y-m-d'));
        $AnalisesConfig->setData_Update(date('Y-m-d'));
        
        
        $AnalisesConfig->setCod_Utilizador($idUser);
        $AnalisesConfig->setCod_Filiar($filiar_clinica);

	$idanalise= $AnalisesConfig->inserir_analises(Ligar::chamar_bd());

	if(empty($idanalise)) {
            "erro";
        }else{
            "sucesso";
        }
        }
	catch(Exception $e){
            
	}


?>