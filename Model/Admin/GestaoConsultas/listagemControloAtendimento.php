<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_controloAtendimento= new listagensConsultas();

echo $listar_controloAtendimento->controloAtedimento(Ligar::chamar_bd());

