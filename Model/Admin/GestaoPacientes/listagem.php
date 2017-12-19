<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoPacientes.php");

$paciente= new GestaoPacientes();

echo $paciente->ListagemPacientes(Ligar::chamar_bd());