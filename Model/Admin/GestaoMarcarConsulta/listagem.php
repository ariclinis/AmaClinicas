<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoAgendar.php");

$agendaconsulta= new GestaoAgendar();

echo $agendaconsulta->ListagemConsultas(Ligar::chamar_bd());