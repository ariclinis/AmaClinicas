<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoAnalise.php");

$analisesclinicas= new GestaoAnalise();

echo $analisesclinicas->listagemAnalises(Ligar::chamar_bd());