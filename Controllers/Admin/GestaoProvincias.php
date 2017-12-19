<?php

Class GestaoProvincias{
    private $queryListagem= "SELECT * FROM `provincias`";
    private $Id;
    private $Cod_Provincia;
    private $Des_Provincia;
    private $Id_Estado;
    private $Cod_Pais;
    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    public function getCod_Provincia()
    {
        return $this->Cod_Provincia;
    }

    public function setCod_Provincia($Cod_Provincia)
    {
        $this->Cod_Provincia = $Cod_Provincia;
        return $this;
    }

    public function getDes_Provincia()
    {
        return $this->Des_Provincia;
    }

    public function setDes_Provincia($Des_Provincia)
    {
        $this->Des_Provincia = $Des_Provincia;
        return $this;
    }

    public function getId_Estado()
    {
        return $this->Id_Estado;
    }

    public function setId_Estado($Id_Estado)
    {
        $this->Id_Estado = $Id_Estado;
        return $this;
    }

    public function getCod_Pais()
    {
        return $this->Cod_Pais;
    }

    public function setCod_Pais($Cod_Pais)
    {
        $this->Cod_Pais = $Cod_Pais;
        return $this;
    }


    public function listagemProvincias(PDO $con){

        $executeQuery = $con->prepare($this->queryListagem);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

}