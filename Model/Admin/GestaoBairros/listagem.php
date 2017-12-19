<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoBairros.php");

$municipios = new GestaoBairros();

echo $municipios->listagemBairros(Ligar::chamar_bd());
