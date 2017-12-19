<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoMunicipios.php");

$municipios = new GestaoMunicipios();

echo $municipios->listagemMunicipios(Ligar::chamar_bd());
