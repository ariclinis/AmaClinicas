<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoDepartamentos.php");

$listar = new GestaoDepartamentos();

echo $listar->listagem_Departamentos(Ligar::chamar_bd());
