<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_meuspacientes_analises= new ListagemAnaliseClinicas();

echo $listar_meuspacientes_analises->Analisesmeuspacientes(Ligar::chamar_bd());