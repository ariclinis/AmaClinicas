<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Anas Tadeu
 */
class Paciente {
    //put your code here
    Private $pegar_paciente = 'INSERT INTO tbl_paciente(estado, obs, cod_pessoa, Ocup_Prof, cod_utilizador)VALUES(?,?,?,?,?)';
    private $cod_paciente;
    private $estado;
    private $obs;
    private $cod_pessoa;
    private $Ocup_Prof;
    private $cod_utilizador;

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

        public function getCod_paciente() {
        return $this->cod_paciente;
    }
    public function getObs() {
        return $this->obs;
    }

    public function getCod_pessoa() {
        return $this->cod_pessoa;
    }
    public function getCod_utilizador() {
        return $this->cod_utilizador;
    }

    public function setCod_paciente($cod_paciente) {
        $this->cod_paciente = $cod_paciente;
        return $this;
    }
    public function setObs($obs) {
        $this->obs = $obs;
        return $this;
    }

    public function setCod_pessoa($cod_pessoa) {
        $this->cod_pessoa = $cod_pessoa;
        return $this;
    }

    public function setCod_utilizador($cod_utilizador) {
        $this->cod_utilizador = $cod_utilizador;
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
            $this->getEstado(),
            $this->getObs(),
            $this->getCod_pessoa(),
            $this->getgetOcup_Prof(),
            $this->getCod_utilizador()
        ));
     return $con->lastInsertId();
    }

}
