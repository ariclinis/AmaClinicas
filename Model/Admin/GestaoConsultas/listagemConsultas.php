<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_consultas= new listagensConsultas();

echo $listar_consultas->listarConsultasMarcadas(Ligar::chamar_bd());