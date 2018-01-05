<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoFarmacia.php");

$produto = new GestaoFarmacia();

$produto->setPesquisa(filter_input(INPUT_POST, 'medicamento'));
echo $produto->listagem_produtos_dados(Ligar::chamar_bd());
