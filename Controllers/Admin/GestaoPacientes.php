<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Ariclene M2G
 */
class GestaoPacientes{
    //put your code here
    Private $pegar_paciente = 'INSERT INTO tbl_paciente(obs, id_pessoa, id_utilizador) VALUES (?,?,?)';
    Private $query_select = "SELECT * FROM `paciente_v`";
    private $Id;
    private $estado;
    private $obs;
    private $Id_pessoa;
    private $Ocup_Prof;
    private $Id_utilizador;

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

        public function getId() {
        return $this->Id;
    }
    public function getObs() {
        return $this->obs;
    }

    public function getId_pessoa() {
        return $this->Id_pessoa;
    }
    public function getId_utilizador() {
        return $this->Id_utilizador;
    }

    public function setId($Id) {
        $this->Id = $Id;
        return $this;
    }
    public function setObs($obs) {
        $this->obs = $obs;
        return $this;
    }

    public function setId_pessoa($Id_pessoa) {
        $this->Id_pessoa = $Id_pessoa;
        return $this;
    }

    public function setId_utilizador($Id_utilizador) {
        $this->Id_utilizador = $Id_utilizador;
        return $this;
    }

    function getOcup_Prof() {
        return $this->Ocup_Prof;
    }

    function setOcup_Prof($Ocup_Prof) {
        $this->Ocup_Prof = $Ocup_Prof;
    }


    public function inserir_Paciente(PDO $con) {
        $stmt = $con->prepare($this->pegar_paciente);
        $stmt->execute(array(
            $this->getObs(),
            $this->getId_pessoa(),
            $this->getId_utilizador()
        ));
     return $con->lastInsertId();
    }
    public function ListagemPacientes(PDO $con){
        $executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }
}
