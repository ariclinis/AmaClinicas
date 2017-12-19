<?php

/**
 *
 *
 * @author Ariclene Chimbili
 */
class Pessoa {

    //put your code here
    public $pegar_pessoa = "INSERT INTO tbl_pessoa(nome, nome_pai, nome_mae, n_bi, data_nasc, genero, nacionalidade, data_registo, Idade, Id_Contacto, Id_Bairro, Id_Filiar_Clinica, Provincia_localidade, Municipio_Localidade) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    private $Id;
    private $Nome;
    private $Nome_pai;
    private $Nome_mae;
    private $N_bi;
    private $Data_nasc;
    private $Genero;
    private $Nacionalidade;
    private $Data_registo;
    private $idade;
    private $Id_filiarClinica;
    private $Id_contacto;
    private $Id_bairro;
    private $Provincia_localidade;
    Private $Municipio_Localidade;



    function getId() {
        return $this->Id;
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

    function getId_filiarClinica() {
        return $this->Id_filiarClinica;
    }

    function getId_contacto() {
        return $this->Id_contacto;
    }

    function getProvincia_localidade() {
        return $this->Provincia_localidade;
    }

    function getMunicipio_Localidade() {
        return $this->Municipio_Localidade;
    }

    function setId($Id) {
        $this->Id = $Id;
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

    function setId_filiarClinica($Id_filiarClinica) {
        $this->Id_filiarClinica = $Id_filiarClinica;
    }

    function setId_contacto($Id_contacto) {
        $this->Id_contacto = $Id_contacto;
    }

    function setProvincia_localidade($Provincia_localidade) {
        $this->Provincia_localidade = $Provincia_localidade;
    }

    function setMunicipio_Localidade($Municipio_Localidade) {
        $this->Municipio_Localidade = $Municipio_Localidade;
    }

    function getId_bairro() {
        return $this->Id_bairro;
    }

    function setId_bairro($Id_bairro) {
        $this->Id_bairro = $Id_bairro;
    }
    public function Calcular_idade($data_enviada){
        if (empty($data_enviada)) {
            # code...
        }else{
            $data = $data_enviada;

// Separa em ano, mês e dia
        list($ano, $mes, $dia) = explode('-', $data);

// Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

// Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

// Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;
        }

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
            date("Y-m-d H:i:s"),
            $this->getIdade(),
            $this->getId_Contacto(),
            $this->getId_Bairro(),
            $this->getId_filiarClinica(),
            $this->getProvincia_localidade(),
            $this->getMunicipio_Localidade()
        ));
        return $con->lastInsertId();
    }


}
