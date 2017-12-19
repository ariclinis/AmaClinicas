<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoSistema.php");

$listar_modulos= new Administracao();

echo $listar_modulos->listagemModulo(Ligar::chamar_bd());