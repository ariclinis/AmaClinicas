<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_Analises= new ListagemAnaliseClinicas();

echo $listar_Analises->listarAnalises(Ligar::chamar_bd());