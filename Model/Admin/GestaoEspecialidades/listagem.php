<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoEspecialidades.php");

$especialidades = new GestaoEspecialidades();

echo $especialidades->listagemEspecialidades(Ligar::chamar_bd());
