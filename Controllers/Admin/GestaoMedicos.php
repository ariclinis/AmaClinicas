<?php

/**
*
*/
class GestaoMedicos
{
 private $query_select="SELECT * FROM medicos_v";
 
 private $query_insert="INSERT INTO `tbl_medicos` (`Id_Pessoa`, `Id_Especialidade`, `Id_User`, `Id_Funcionario`, `obs`) VALUES (?, ?, ?, ?, ?);";
 
 private $id;
 private $Idpessoa;
 private $IdEspecialidade;
 private $IdUtilizador;
 private $idfuncionario;
 private $obs;
 
 function getId() { 
     return $this->id;
 }

 function getIdpessoa() {
     return $this->Idpessoa;
 }

 function getIdEspecialidade() {
     return $this->IdEspecialidade;
 }

 function getIdUtilizador() {
     return $this->IdUtilizador;
 }

 function setId($id) {
     $this->id = $id;
 }

 function setIdpessoa($Idpessoa) {
     $this->Idpessoa = $Idpessoa;
 }

 function setIdEspecialidade($IdEspecialidade) {
     $this->IdEspecialidade = $IdEspecialidade;
 }

 function setIdUtilizador($IdUtilizador) {
     $this->IdUtilizador = $IdUtilizador;
 }

 function getObs() {
     return $this->obs;
 }
 function setObs($obs) {
     $this->obs = $obs;
 }

 function getIdfuncionario() {
     return $this->idfuncionario;
 }

 function setIdfuncionario($idfuncionario) {
     $this->idfuncionario = $idfuncionario;
 }

  
   public function inserir_doctor(PDO $con) {
        $stmt = $con->prepare($this->query_insert);
        $stmt->execute(
            array(
            $this->getIdpessoa(),
            $this->getIdEspecialidade(),
            $this->getIdUtilizador(),
            $this->getIdfuncionario(),
            $this->getObs()
        )
    );
     return $con->lastInsertId();
    }
    
    public function listagem_medicos(PDO $con){
    	$executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {
            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }
}