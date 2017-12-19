
$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});


function listagemconsultas(){
    var dados = $("#listaconsultas");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoAgendar/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Outras operações<span class='caret'></span></button><ul class='dropdown-menu'><li><a href=''>Imprimir ficha</a></li><li><a href=''>Ver historial</a></li></ul></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.nome+"</td><td>"+val.Hora_Inicio+"</td><td>"+val.Descricao+"</td><td>"+val.Data_Agenda+"</td><td>"+val.Nome_User+"</td><td>"+val.Estado_agenda+"</td></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

function inserirAgendaConsulta(){

console.log("click");
 $('#Cadastro_Consulta_Agendar').on('click',function(){
        var especialidade = jQuery('#especialidade').val();
        var medico = jQuery('#medico').val();
        var Data_Consulta =jQuery('#data_consulta').val();
        var hora = jQuery('#hora').val();

    $.ajax({
        type: "POST",
        data: "especialidade="+especialidade+"&medico="+medico+"&data_consulta="+Data_Consulta+"&hora="+hora,
        url: "../Model/Admin/GestaoAgendar/inserir.php",
        success:function(resultado){
            if (resultado=="campos_vazios") {
                   $('#msg_agendar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);

            }else if(resultado=="erro"){
                   // $('#msg_agendar').html('<div class="alert alert-warning" role="alert">'+especialidade+medico+Data_Consulta+hora+'</div>');
                    $('#msg_agendar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            }else if (resultado =="success") {
                 jQuery('#Data_Consulta').val("");
                jQuery('#hora').val("");
                jQuery('#medico').val("");
                jQuery('#especialidade').val("");
                $('#msg_agendar').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
            }else{
                $('#msg_agendar').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                //window.setTimeout("location.href='./AgendaListagem.php'", 400);
            }

        }
    });
});
}