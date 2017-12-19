<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_pacientesAtendidos= new listagensConsultas();

echo $listar_pacientesAtendidos->PacientesAtendidos(Ligar::chamar_bd());