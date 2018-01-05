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

function inserir_venda(){
console.log("click");
 $('#pagar_compra').on('click',function(){

        var valortotal = jQuery('#valortotal').val();
        var desc = jQuery('#desc').val();
        var formapag = jQuery('#formapag').val();
        var valor_recebido = jQuery('#valor_recebido').val();
        var troco = jQuery('#troco').val();
        console.log(desc);
    $.ajax({
        type: "POST",
        data: "valor_factura="+valortotal+"&desconto="+desc+"&forma="+formapag+"&valorrecebido="+valor_recebido+"&troco="+troco+"&codproduto="+codigo_produto+"&produto="+produto+"&preco="+preco_uni+"&qtd="+quantidade+"&total="+subtotal,
        url: "../Model/Admin/",
        success:function(resultado){
            if(resultado=="sucesso"){
                $('#msg_venda').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong> Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300); 
            }else{
                console.log(resultado);
                //$('#msg_medico').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong> Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            }
        }
    });

});
}


var codigo_produto = Array();
var produto = Array();
var preco_uni = Array();
var quantidade = Array();
var subtotal=Array();
var valortotal=0;

function Adicionar_Produto(){  
 console.log("click");
 
    $('#adiconar_produtos').on('click',function(){
        var nome_producto =$('#produto :selected').text();
        var preco_v=$('#preco').val();
        var quantidade_v = $('#qtd').val();
        var producto = $('#produto').val();
        if(preco_v.length == 0 || quantidade_v <1 || producto==0 ||preco_v<0 ){
            console.log('Ocorreu um erro'+preco_v+quantidade_v);
            $('#msg_departamento').html('<div class="alert alert-warning" role="alert"> <strong>Irregularidade! </strong>Preencha todos os campos.</div>').show(300).delay(8000).hide(300);
        }else{
        codigo_produto.push($('#cod_produti').val());
        produto.push(parseFloat($('#produto').val()));
        preco_uni.push(parseFloat($('#preco').val()));
        quantidade.push(parseFloat($('#qtd').val()));
        subtotal.push(parseFloat($('#preco').val())*parseFloat($('#qtd').val()));
        var result_sub = subtotal[subtotal.length -1];
         valortotal += parseFloat(result_sub);
        $("#produtos").append('<tr><td><font color=black>'+$('#cod_produti').val()+'</font></td><td><font color=black>'+nome_producto+'</font></td><td><font color=black>'+$('#preco').val()+'</font></td><td><font color=black>'+$('#qtd').val()+'</font></td><td><font color=black>'+result_sub+'</font></td></tr>');
        $('#valortotal').val(valortotal);
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
 

    