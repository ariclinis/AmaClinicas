

$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});


function listagemconsultasmarcadas(){
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
function inserirconsultamarcar(){
$('#CadastroConsultaPaciente').on('click',function(){
        var paciente = jQuery('#paciente').val();
        var especialidade = jQuery('#especialidade').val();
        var medico=jQuery('#medico').val();
        var data_consulta =jQuery('#data_consulta').val();
        var peso = jQuery('#peso').val();
        //var estado_consulta=jQuery('#Estado_consulta').val();
        var situa=jQuery('#situa').val();
    $.ajax({
        type: "POST",
        data: "paciente="+paciente+"&especialidade="+especialidade+"&medico="+medico+"&data_consulta="+data_consulta+"&peso="+peso+"&situa="+situa,
        url: "../Model/Admin/GestaoMarcarConsulta/inserir.php",
        success:function(resultado){
            if (resultado=="obrigatorios") {
                   $('#msg_marcar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);
            }else if(resultado=="erro"){
                    $('#msg_marcar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            }
            else if (resultado == "sucess"){
                jQuery('#data_consulta').val("");
                jQuery('#situa').val("");
                jQuery('#paciente').val("");
                jQuery('#especialidade').val("");
                jQuery('#medico').val("");
                jQuery('#peso').val("");
                $('#msg_marcar').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
            }
            else{
                    $('#msg_marcar').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            }
        }
    });
});

}