<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoListagens.php");

$listar_AnalisesAtendidas= new ListagemAnaliseClinicas();

echo $listar_AnalisesAtendidas->AnalisesAtendidas(Ligar::chamar_bd());