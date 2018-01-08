<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestaoFarmacia
 *
 * @author AMATECH
 */
class GestaoFarmacia {
    private $query_select="SELECT * FROM `tbl_clientes`";
    private $query_produtos="SELECT * FROM `tbl_produtos`";
    private $query_dados_producto="SELECT * FROM `tbl_entrada_produtos` WHERE id_produto =? ORDER BY data_registo DESC LIMIT 1";
    private $query_selecionar_quantidade_produto ="SELECT * FROM `tbl_entrada_produtos` WHERE `id_produto`= ?";
    private $query_descontar_quantidade_produto ="UPDATE `tbl_entrada_produtos` SET `qtdstock`= `qtdstock` - ? WHERE `id_produto`= ?";
    private $insert_factura="INSERT INTO `tbl_vendas`(`n_factura`, `cod_cliente`, `valor_factura`, `total`, `descontos`, `valor_recebido`, `troco`, `forma_pagamento`, `data_venda`, `id_utilizador`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    
    Private $insert_produtos="INSERT INTO `tbl_venda_produtos`(`idvenda`, `Idproduto`, `data_registo`, `qtd_compra`) VALUES (?,?,?,?)";
    
    private $pesquisa;
    private $n_factura;
    private $cod_cliente;
    private $qtd_compra;
    private $valor_factura;
    private $total;
    private $descontos;
    private $valor_recebido;
    private $forma_pagamento;
    private $data_venda;
    private $id_utilizador;
    private $troco;
     //insert de produtos
    private $idvenda;
    private $idproduto;
    private $dataregisto;
    
    function getN_factura() {
        return $this->n_factura;
    }

    function getCod_cliente() {
        return $this->cod_cliente;
    }

    function getQtd_compra() {
        return $this->qtd_compra;
    }

    function getValor_factura() {
        return $this->valor_factura;
    }

    function getTotal() {
        return $this->total;
    }

    function getDescontos() {
        return $this->descontos;
    }

    function getValor_recebido() {
        return $this->valor_recebido;
    }

    function getForma_pagamento() {
        return $this->forma_pagamento;
    }

    function getData_venda() {
        return $this->data_venda;
    }

    function getId_utilizador() {
        return $this->id_utilizador;
    }

    function setN_factura($n_factura) {
        $this->n_factura = $n_factura;
    }

    function setCod_cliente($cod_cliente) {
        $this->cod_cliente = $cod_cliente;
    }

    function setQtd_compra($qtd_compra) {
        $this->qtd_compra = $qtd_compra;
    }

    function setValor_factura($valor_factura) {
        $this->valor_factura = $valor_factura;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setDescontos($descontos) {
        $this->descontos = $descontos;
    }

    function setValor_recebido($valor_recebido) {
        $this->valor_recebido = $valor_recebido;
    }

    function setForma_pagamento($forma_pagamento) {
        $this->forma_pagamento = $forma_pagamento;
    }

    function setData_venda($data_venda) {
        $this->data_venda = $data_venda;
    }

    function setId_utilizador($id_utilizador) {
        $this->id_utilizador = $id_utilizador;
    }

    function getIdvenda() {
        return $this->idvenda;
    }

    function getIdproduto() {
        return $this->idproduto;
    }

    function getDataregisto() {
        return $this->dataregisto;
    }

    function setIdvenda($idvenda) {
        $this->idvenda = $idvenda;
    }

    function setIdproduto($idproduto) {
        $this->idproduto = $idproduto;
    }

    function setDataregisto($dataregisto) {
        $this->dataregisto = $dataregisto;
    }
    
    /**
     * Get the value of pesquisa
     */ 
    public function getPesquisa()
    {
        return $this->pesquisa;
    }

    /**
     * Set the value of pesquisa
     *
     * @return  self
     */ 
    public function setPesquisa($pesquisa)
    {
        $this->pesquisa = $pesquisa;

        return $this;
    }
        
        /**
     * Get the value of troco
     */ 
    public function getTroco()
    {
        return $this->troco;
    }

    /**
     * Set the value of troco
     *
     * @return  self
     */ 
    public function setTroco($troco)
    {
        $this->troco = $troco;

        return $this;
    }
//--------------------------- INSERTES -------------------------//
public function inserir_venda(PDO $con){
    
        $stmt = $con->prepare("INSERT INTO `tbl_vendas`(`n_factura`, `cod_cliente`, `valor_factura`, `total`, `descontos`, `valor_recebido`, `troco`, `forma_pagamento`, `data_venda`, `id_utilizador`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute(
            array(
            $this->getN_factura(),
            $this->getCod_cliente(),
            $this->getValor_factura(),
            $this->getTotal(),
            $this->getDescontos(),
            $this->getValor_recebido(),
            $this->getTroco(),
            $this->getForma_pagamento(),
            $this->getData_venda(),
            $this->getId_utilizador()
         
        )
        );
     return $con->lastInsertId();
    }
public function inserir_venda_produtos(PDO $con) {
        $stmt = $con->prepare($this->insert_produtos);
        $stmt->execute(
            array(
            $this->getIdvenda(),
            $this->getIdproduto(),
            date('m-d-Y'),
            $this->getQtd_compra()
        ));
     return $con->lastInsertId();
    }
// -----------------------------SELECTES COM WHERE OU CONDICÕES---------//

public function listagem_produtos_dados(PDO $con){
    $executeQuery = $con->prepare($this->query_dados_producto);
    $executeQuery->execute(array($this->getPesquisa()));
    $resultados = array();
    while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {
        $resultados[] = $dadoListar;
    }
    return json_encode($resultados) ;
}

//------------------------------ SELECTES --------------------------//
public function listagem_clientes(PDO $con){
    	$executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {
            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

public function listagem_produtos(PDO $con){
    	$executeQuery = $con->prepare($this->query_produtos);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {
            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }
//------------------------------ UPDATES ------------------------------//
public function descontar_quantidade_produto(PDO $con){
    $executeQuery = $con->prepare($this->query_descontar_quantidade_produto);
    $executeQuery->execute(
        array(
                $this->getQtd_compra(),
                $this->getIdproduto()
        ));
}

}
