<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_meuspacientes= new listagensConsultas();

echo $listar_meuspacientes->meuspacientes(Ligar::chamar_bd());