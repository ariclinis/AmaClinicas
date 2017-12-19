<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoUtilizadores.php");

$listar_useres= new Utilizadores();

echo $listar_useres->listagemUtilizadores(Ligar::chamar_bd());