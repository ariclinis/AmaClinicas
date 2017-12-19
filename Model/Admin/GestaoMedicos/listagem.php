<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoMedicos.php");

$listar = new GestaoMedicos();

echo $listar->listagem_medicos(Ligar::chamar_bd());
