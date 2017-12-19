<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoProvincias.php");

$provincia = new GestaoProvincias();

echo $provincia->listagemProvincias(Ligar::chamar_bd());
