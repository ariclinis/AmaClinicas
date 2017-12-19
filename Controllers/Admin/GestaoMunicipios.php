<?php

Class GestaoMunicipios{
    private $queryListagem= "SELECT * FROM `municipios`";
    private $Id;
    private $Cod_Municipio;
    private $Des_Municipio;
    private $Id_Estado;
    private $Id_Provincia;
    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

public function getId_Provincia()
{
    return $this->Id_Provincia;
}

public function setId_Provincia($Id_Provincia)
{
    $this->Id_Provincia = $Id_Provincia;
    return $this;
}

public function getDes_Municipio()
{
    return $this->Des_Municipio;
}

public function setDes_Municipio($Des_Municipio)
{
    $this->Des_Municipio = $Des_Municipio;
    return $this;
}

public function getCod_Municipio()
{
    return $this->Cod_Municipio;
}

public function setCod_Municipio($Cod_Municipio)
{
    $this->Cod_Municipio = $Cod_Municipio;
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



    public function listagemMunicipios(PDO $con){

        $executeQuery = $con->prepare($this->queryListagem);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

}