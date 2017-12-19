

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
function inserir_utilizador(){
console.log("click");
$('#cadastrarUtilizador').on('click',function(){
        var nomeuser = jQuery('#nomeutili').val();
        var nomelogin = jQuery('#loginome').val();
        var senha=jQuery('#senhav').val();
        var estadouser =jQuery('#estadoutili').val();
        var nivel = jQuery('#nnivel').val();
    $.ajax({
        type: "POST",
        data: "nomeutilizador="+nomeuser+"&nomeentrar="+nomelogin+"&senhavalida="+senha+"&estado="+estadouser+"&nivelacesso="+nivel,
        url: "../Model/Admin/GestaoUtilizadores/inserir.php",
        success:function(resultado){
            
            if(resultado==="sucesso"){
                $('#msg_utilizador').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
            }else{
                //console.log(resultado+":->"+"NOme->"+nomeuser+"NOme_olgin->"+nomelogin+"senha->"+senha+"estado->"+estadouser+"nivel->"+nivel);
                $('#msg_utilizador').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);  
            }
        }
    });
});

}