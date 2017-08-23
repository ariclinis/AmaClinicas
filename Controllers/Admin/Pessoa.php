<?php

/**
 * 
 *
 * @author Ariclene Chimbili
 */
class Pessoa {

    //put your code here
    public $pegar_pessoa = "INSERT INTO tbl_pessoa(nome, nome_pai, nome_mae, n_bi, data_nasc, genero, nacionalidade,data_registo, Cod_provincia_nasc, Cod_municipio_nasc, Idade, Cod_Contacto, Cod_Bairro, Cod_Filiar_Clinica,Provincia_localidade, Municipio_Localidade)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    private $Cod_pessoa;
    private $Nome;
    private $Nome_pai;
    private $Nome_mae;
    private $N_bi;
    private $Data_nasc;
    private $Genero;
    private $Nacionalidade;
    private $Data_registo;
    private $Cod_provincia_nasc;
    private $Cod_municipio_nasc	;
    private $idade;
    private $Cod_Filiar_Clinica;
    private $Cod_Contacto;
    private $Cod_Bairro;
    private $Provincia_localidade;
    Private $Municipio_Localidade;


    
    function getCod_pessoa() {
        return $this->Cod_pessoa;
    }

    function getNome() {
        return $this->Nome;
    }

    function getNome_pai() {
        return $this->Nome_pai;
    }

    function getNome_mae() {
        return $this->Nome_mae;
    }

    function getN_bi() {
        return $this->N_bi;
    }

    function getData_nasc() {
        return $this->Data_nasc;
    }

    function getGenero() {
        return $this->Genero;
    }

    function getNacionalidade() {
        return $this->Nacionalidade;
    }

    function getData_registo() {
        return $this->Data_registo;
    }

    function getCod_provincia_nasc() {
        return $this->Cod_provincia_nasc;
    }

    function getCod_municipio_nasc() {
        return $this->Cod_municipio_nasc;
    }

    function getIdade() {
        return $this->idade;
    }

    function getCod_Filiar_Clinica() {
        return $this->Cod_Filiar_Clinica;
    }

    function getCod_Contacto() {
        return $this->Cod_Contacto;
    }

    function getProvincia_localidade() {
        return $this->Provincia_localidade;
    }

    function getMunicipio_Localidade() {
        return $this->Municipio_Localidade;
    }

    function setCod_pessoa($Cod_pessoa) {
        $this->Cod_pessoa = $Cod_pessoa;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setNome_pai($Nome_pai) {
        $this->Nome_pai = $Nome_pai;
    }

    function setNome_mae($Nome_mae) {
        $this->Nome_mae = $Nome_mae;
    }

    function setN_bi($N_bi) {
        $this->N_bi = $N_bi;
    }

    function setData_nasc($Data_nasc) {
        $this->Data_nasc = $Data_nasc;
    }

    function setGenero($Genero) {
        $this->Genero = $Genero;
    }

    function setNacionalidade($Nacionalidade) {
        $this->Nacionalidade = $Nacionalidade;
    }

    function setData_registo($Data_registo) {
        $this->Data_registo = $Data_registo;
    }

    function setCod_provincia_nasc($Cod_provincia_nasc) {
        $this->Cod_provincia_nasc = $Cod_provincia_nasc;
    }

    function setCod_municipio_nasc($Cod_municipio_nasc) {
        $this->Cod_municipio_nasc = $Cod_municipio_nasc;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setCod_Filiar_Clinica($Cod_Filiar_Clinica) {
        $this->Cod_Filiar_Clinica = $Cod_Filiar_Clinica;
    }

    function setCod_Contacto($Cod_Contacto) {
        $this->Cod_Contacto = $Cod_Contacto;
    }

    function setProvincia_localidade($Provincia_localidade) {
        $this->Provincia_localidade = $Provincia_localidade;
    }

    function setMunicipio_Localidade($Municipio_Localidade) {
        $this->Municipio_Localidade = $Municipio_Localidade;
    }
    
    function getCod_Bairro() {
        return $this->Cod_Bairro;
    }

    function setCod_Bairro($Cod_Bairro) {
        $this->Cod_Bairro = $Cod_Bairro;
    }
    
        public function inserir_pessoa(PDO $con) {
        $stmt = $con->prepare($this->pegar_pessoa);
        $stmt->execute(array(
            $this->getNome(),
            $this->getNome_pai(),
            $this->getNome_mae(),
            $this->getN_bi(),
            $this->getData_nasc(),
            $this->getGenero(),
            $this->getNacionalidade(),
            $this->getData_registo(),
            $this->getCod_provincia_nasc(),
            $this->getCod_municipio_nasc(),
            $this->getIdade(),
            $this->getCod_Contacto(),
            $this->getCod_Bairro(),
            $this->getCod_Filiar_Clinica(),
            $this->getProvincia_localidade(),
            $this->getMunicipio_Localidade()
        ));
        return $con->lastInsertId();
    }


}
