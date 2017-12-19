<?php

/**
* 
*/
class GestaoAnalise
{
 private $query_select="SELECT * FROM tbl_analises_clinicas";
 private $query_insert="INSERT INTO tbl_analises_clinicas (`CodAnalise`, `DescAnalise`, `Estado`, `Data_Registo`, `Data_Update`, `idUtilizador`, `Cod_Filiar`) VALUES (?,?,?,?,?,?,?)";
 private $id;
 private $Codigo;
 private $Descricao;
 private $Estad;
 private $Data_Registo;
 private $Data_Update;
 private $Cod_Utilizador;
 private $Cod_Filiar;

 function getCodigo() { 
     return $this->Codigo;
 }

 function getDescricao() {
     return $this->Descricao;
 }

 function getEstad() {
     return $this->Estad;
 }

 function getData_Registo() {
     return $this->Data_Registo;
 }

 function getData_Update() {
     return $this->Data_Update;
 }

 function getCod_Utilizador() {
     return $this->Cod_Utilizador;
 }

 function getCod_Filiar() {
     return $this->Cod_Filiar;
 }

 function setCodigo($Codigo) {
     $this->Codigo = $Codigo;
 }

 function setDescricao($Descricao) {
     $this->Descricao = $Descricao;
 }

 function setEstad($Estad) {
     $this->Estad = $Estad;
 }

 function setData_Registo($Data_Registo) {
     $this->Data_Registo = $Data_Registo;
 }

 function setData_Update($Data_Update) {
     $this->Data_Update = $Data_Update;
 }

 function setCod_Utilizador($Cod_Utilizador) {
     $this->Cod_Utilizador = $Cod_Utilizador;
 }

 function setCod_Filiar($Cod_Filiar) {
     $this->Cod_Filiar = $Cod_Filiar;
 }

 public function listagemAnalises(PDO $con){
    	$executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

    public function inserir_analises(PDO $con){
        $stmt = $con->prepare($this->query_insert);
        $stmt->execute(array(
            $this->getCodigo(),
            $this->getDescricao(),
            $this->getEstad(),
            $this->getData_Registo(),
            $this->getData_Update(),
            $this->getCod_Utilizador(),
            $this->getCod_Filiar()
        ));
     return $con->lastInsertId();
    }
}