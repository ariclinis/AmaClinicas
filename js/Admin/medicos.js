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

function inserir_Medico(){
console.log("click");
 $('#cadastrar_medico').on('click',function(){
        var nome = jQuery('#nome').val();
        var nomepai = jQuery('#nome_pai').val();
        var nomemae = jQuery('#nome_mae').val();
        var bi = jQuery('#bi').val();
        var datanasc = jQuery('#Data_nasc').val();
        var genero = jQuery('#genero').val();
        var nacio = jQuery('#nacio').val();
        var especialidade = jQuery('#especialidade').val();
        var obsserva = jQuery('#obsserva').val();
        var provloca = jQuery('#provincia_localidade').val();
        var muniloca = jQuery('#municipio_localidade').val();
        var bairro = jQuery('#bairro').val();
        var phone = jQuery('#telefone').val();
        var email = jQuery('#email').val();
    $.ajax({
        type: "POST",
        data: "nome="+nome+"&nomemae="+nomemae+"&nomepai="+nomepai+"&bi="+bi+"&datanasc="+datanasc+"&genero="+genero+"&nacio="+nacio+"&especialidade="+especialidade+"&obsserva="+obsserva+"&muniloca="+muniloca+"&provloca="+provloca+"&bairro="+bairro+"&phone="+phone+"&email="+email,
        url: "../Model/Admin/GestaoMedicos/inserir.php",
        success:function(resultado){
            if(resultado=="sucesso"){
                $('#msg_medico').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong> Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300); 
            }else{
                console.log(resultado);
                //$('#msg_medico').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong> Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            }
        }
    });

});
}


function listagemMedicos(){
    var dados = $("#listmedicos");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoMedicos/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Outras Operações<span class='caret'></span></button><ul class='dropdown-menu'><li><a href=''>Imprimir ficha</a></li><li><a href=''>Editar Registo</a></li></ul></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.nome+"</td><td>"+val.genero+"</td><td>"+val.data_nasc+"</td><td>"+val.Descricao+"</td><td>"+val.Telefone+"</td><td>"+val.data_registo+"</td><td>"+btnOutros+"</td></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}