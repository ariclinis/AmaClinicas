<?php

Class GestaoBairros{
    private $queryListagem= "SELECT * FROM `bairros`";
    private $Id;
    private $Cod_Bairros;
    private $Des_Bairros;
    private $Id_Estado;
    private $Id_Municipio;

    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    public function getId_Municipio()
    {
        return $this->Id_Municipio;
    }

    public function setId_Municipio($Id_Municipio)
    {
        $this->Id_Municipio = $Id_Municipio;
        return $this;
    }
    public function getCod_Bairro()
    {
        return $this->Cod_Bairro;
    }

    public function setCod_Bairro($Cod_Bairro)
    {
        $this->Cod_Bairros = $Cod_Bairro;
        return $this;
    }

    public function getDes_Bairro()
    {
        return $this->Des_Bairro;
    }

    public function setDes_Bairro($Des_Bairro)
    {
        $this->Des_Bairro = $Des_Bairro;
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



    public function listagemBairros(PDO $con){

        $executeQuery = $con->prepare($this->queryListagem);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

}