<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoCargos.php");

$cargos = new GestaoCargos();

echo $cargos->listagem_cargos(Ligar::chamar_bd());
