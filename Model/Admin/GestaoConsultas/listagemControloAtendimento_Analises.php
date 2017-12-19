<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_controloAtendimento_Analises= new ListagemAnaliseClinicas();

echo $listar_controloAtendimento_Analises->controloAtedimentoAnalises(Ligar::chamar_bd());

