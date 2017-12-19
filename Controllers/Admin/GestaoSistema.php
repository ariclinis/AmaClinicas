<?php

class Administracao{
private $query_select_modul="select * from tbl_modulos_sistema";



public function listagemModulo(PDO $con){
    	$executeQuery = $con->prepare($this->query_select_modul);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }        return json_encode($resultados) ;

}
}