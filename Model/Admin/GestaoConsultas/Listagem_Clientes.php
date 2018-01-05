<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Listagem_Clientes
 *
 * @author AMATECH
 */
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoFarmacia.php");

$lista_cliente= new GestaoFarmacia();

echo $lista_cliente->listagem_clientes(Ligar::chamar_bd());
