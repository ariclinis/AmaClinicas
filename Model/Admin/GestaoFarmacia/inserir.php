<?php
session_start();
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoFarmacia.php");

$venda = new GestaoFarmacia();

try {
        
        $idUser= $_SESSION['cod'];
    
        $venda->setCod_cliente(intval(filter_input(INPUT_POST, 'idcliente')));
        $venda->setForma_pagamento(filter_input(INPUT_POST, 'formapagamento'));
        $venda->setValor_factura(filter_input(INPUT_POST, 'valor_factura'));
        $venda->setDescontos(doubleval(filter_input(INPUT_POST, 'desconto')));
        $venda->setValor_recebido(doubleval(filter_input(INPUT_POST, 'valor_recebido')));
        $venda->setId_utilizador(intval($idUser));
        $venda->setTotal(filter_input(INPUT_POST, 'valor_factura') - filter_input(INPUT_POST, 'desconto') );
        $venda->setTroco(floatval(filter_input(INPUT_POST, 'troco')));
        $venda->setData_venda(date('m-d-Y'));
        $N_factura=date('Y').date('m').date('d').date('H.i.s');
        $venda->setN_factura($N_factura);
        $idvenda = $venda->inserir_venda(Ligar::chamar_bd());
          
        $idproduto = json_decode($_POST['codproduto']);
        $contar_prod = count(json_decode($_POST['codproduto']));//erro mariano
        $quantidade = json_decode(filter_input(INPUT_POST, 'q'));
        $Subtotal = json_decode($_POST['total']);
//       
        for ($i=0;$i<$contar_prod;$i++){
            $venda->setIdvenda($idvenda);
            $venda->setIdproduto($idproduto[$i]);
            $venda->setQtd_compra($quantidade[$i]);
            $venda->setTotal($Subtotal[$i]);
            $id_venda=$venda->inserir_venda_produtos(Ligar::chamar_bd());
            if($id_venda>0){
                $venda->descontar_quantidade_produto(Ligar::chamar_bd());
            }
        }
       /* 
        if ($idvenda>0){
            echo "sucesso";
        }else{
            echo "erro";
        }*/
        $a= filter_input(INPUT_POST, 'codproduto');
        
        echo $contar_prod."/n ".count($Subtotal);
        /*
        echo "cliente".filter_input(INPUT_POST, 'idcliente');
        echo "n/ formapagamento:".filter_input(INPUT_POST, 'formapagamento');
        echo "n/ valor_factura".filter_input(INPUT_POST, 'valor_factura');
        echo "n/ desconto".filter_input(INPUT_POST, 'desconto');
        echo "n/ valor_recebido".filter_input(INPUT_POST, 'valor_recebido');
        echo "n/ troco".filter_input(INPUT_POST, 'troco');*/
        
    } catch (Exception $e) {
}



