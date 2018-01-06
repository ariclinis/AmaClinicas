/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});

var codigo_produto = new Array();
var produto = new Array();
var preco_uni = new Array();
var quantidade = new Array();
var subtotal= new Array();
var valortotal=0;
//Para se Analisar
//-----------------------------------------------
function remover_elementos(variavel){//----------
    var arr = variavel;{             //----------
    var itemtoRemove = "HTML";{      //---------- 
    arr.splice($.inArray(itemtoRemove, arr),1);{//-
}{                                      //---------
$('#remover').on('click', function(){   //---------
                                        //---------
});                                    //--------
//-----------------------------------------------
function inserir_venda(){

    $('#pagar_compra').on('click',function(){
        //var matricula = new FormData();
        var codproduto= JSON.stringify(codigo_produto);
        var q = JSON.stringify(quantidade);
        var cliente_compra=jQuery('#cliente').val();
        var desconto = jQuery('#desconto').val();
        var formapagamento = jQuery('#formapag').val();
        var resultado_valor_total = $('#valortotal').val();
        var valor_recebido = $('#valor_recebido').val();
        var troco = (parseFloat(valor_recebido) - parseFloat(resultado_valor_total));
        $('#troco').val(troco);
        console.log(troco);
    $.ajax({
        type: "POST",
        data:{codproduto:codproduto, valor_factura:resultado_valor_total, desconto:desconto, formapagamento:formapagamento, valor_recebido:valor_recebido, total:resultado_valor_total, idcliente:cliente_compra, q:q, troco:troco},
        url: "../Model/Admin/GestaoFarmacia/inserir.php",
        success:function(resul){
            if(resul=="sucesso"){
                $('#msg_venda').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong> Pagamento efetuado com sucesso.RESULTADO'+resul+'</div>').show(300).delay(5000).hide(300); 
            }else{
                console.log(resul);
                $('#msg_venda').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong> Ocorreu um erro ao fazer o Pagamento RESULTADO:'+resul+'</div>').show(300).delay(5000).hide(300);
                console.log(troco);
            }
        },
        error:function(resul){
            console.log(resul);
        }
    });

});
}

function Desconto(preco_produto, porcentagem){
    var desconto = preco_produto * porcentagem;
    var valor_final =preco_produto - desconto;
    return valor_final;
}
function Carcular_porcentagem(){
    
        $(this).val();
    
}
function Adicionar_Produto(){  
 console.log("click");
 
    $('#adiconar_produtos').on('click',function(){
        var nome_producto =$('#descricao_produto :selected').text();
        var preco_v=$('#preco').val();
        var quantidade_v = $('#qtd').val();
        var producto = $('#descricao_produto').val();
        if(preco_v.length == 0 || quantidade_v <1 || producto==0 ||preco_v<0 ){
            console.log('Ocorreu um erro'+preco_v+quantidade_v);
            $('#msg_departamento').html('<div class="alert alert-warning" role="alert"> <strong>Irregularidade! </strong>Preencha todos os campos.</div>').show(300).delay(8000).hide(300);
        }else{
        codigo_produto.push(parseInt($('#cod_produto').val()));
        produto.push(parseFloat($('#descricao_produto').val()));
        preco_uni.push(parseFloat($('#preco').val()));
        quantidade.push(parseInt($('#qtd').val()));
        subtotal.push(parseFloat($('#preco').val())*parseFloat($('#qtd').val()));
        var result_sub = subtotal[subtotal.length -1];
         valortotal += parseFloat(result_sub);
        $("#produtos").append('<tr><td><font color=black>'+$('#cod_produto').val()+'</font></td><td><font color=black>'+nome_producto+'</font></td><td><font color=black>'+$('#preco').val()+'</font></td><td><font color=black>'+$('#qtd').val()+'</font></td><td><font color=black>'+result_sub+'</font></td></tr>');
        $('#valortotal').val(valortotal);
        console.log(quantidade);
    }
    });
}
function selecionar_producto(medicamento){
    
            $.ajax({
                url:"../Model/Admin/GestaoProdutos/pesquisa.php" ,
                type: "POST",
                data: "medicamento="+medicamento,
                beforeSend: function(){

                }, 
                success:function(resultado){
                    if(resultado=="[]" || resultado.legth ==0){
                        $('#preco').val("0,00");
                    }else{
                    var resultadoObj= JSON.parse(resultado);
                    $.each(resultadoObj, function(key,val){
                        $('#preco').val(val.pvenda);
                    });
                    }
                    
                    
                },
                error:function(){

                }
            });



}
