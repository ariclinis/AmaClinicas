<?php

session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoFarmacia.php");

$lista_produtos = new GestaoFarmacia();

echo $lista_produtos->listagem_produtos(Ligar::chamar_bd());

