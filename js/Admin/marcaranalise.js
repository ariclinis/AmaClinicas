

$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});


function listagemAnalisemarcadas(){
    var dados = $("#listaconsultas");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoMarcarConsulta/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Outras operações<span class='caret'></span></button><ul class='dropdown-menu'><li><a href=''>Imprimir ficha</a></li><li><a href=''>Ver historial</a></li></ul></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Cod_Agenda+"</td><td>"+val.Hora_Inicio+"</td><td>"+val.Descricao+"</td><td>"+val.Data_Agenda+"</td><td>"+val.Nome_User+"</td><td>"+val.Estado_agenda+"</td></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

function listagemPacientesAnalise(){
    var dados = $("#listagemPacientesAnalise");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoMarcarConsulta/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Outras operações<span class='caret'></span></button><ul class='dropdown-menu'><li><a href=''>Imprimir ficha</a></li><li><a href=''>Ver historial</a></li></ul></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Cod_Agenda+"</td><td>"+val.Hora_Inicio+"</td><td>"+val.Descricao+"</td><td>"+val.Data_Agenda+"</td><td>"+val.Nome_User+"</td><td>"+val.Estado_agenda+"</td></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

function inseriranalisemarcar(){

 $('#CadastroAnalise').on('click',function(){
        var paciente = jQuery('#paciente').val();
        //var Analise = jQuery('#Analise').val();
        var data_analise=jQuery('#data_analise').val();
        var situa =jQuery('#situa').val();

        var analise = new Array();
$("input[name='analise[]']:checked").each(function ()
{
   // valores inteiros usa-se parseInt
   analise.push(parseInt($(this).val()));
   // Para pegar string
  // analise.push($(this).val());
});
    $.ajax({
        type: "POST",
        data: {paciente:paciente ,analise:analise ,data_analise:data_analise ,situa:situa},
        url: "../Model/Admin/GestaoLaboratorio/inserir.php",
        success:function(resultado){
            if (resultado == "obrigatorios") {
                   $('#msg_marcar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);
            }else if(resultado == "erro"){
                    $('#msg_marcar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            } else if (resultado == "analise_fazia") {
                    $('#msg_marcar').html('<div class="alert alert-warning" role="alert"> <strong>Irregularidade! </strong>Nenhuma analise selecionada</div>').show(300).delay(5000).hide(300);
            } else if (resultado){
                    jQuery('#paciente').val("");
                    jQuery('#data_analise').val("");
                    jQuery('#situa').val("");
                    jQuery('#analise').val("");
                    $('#msg_marcar').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
            }else{
                    $('#msg_marcar').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
            }
        }
    });
});
}