function listagemAnalises(){
    var dados = $("#corpo_Analise");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoLaboratorio/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Outras operações<span class='caret'></span></button><ul class='dropdown-menu'><li><a href=''>Imprimir ficha</a></li><li><a href=''>Ver historial</a></li></ul></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.CodAnalise+"</td><td>"+val.DescAnalise+"</td><td><button id="+val.id+" class='btn btn-outline btn-danger btn-sm'>Eliminar</button> <button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar </button></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}
function inseriranalises(){

 $('#Cadas_Analise').on('click',function(){
        var id_analise = jQuery('#id_analise').val();
        var descanalise = jQuery('#descanalise').val();
    $.ajax({
        type: "POST",
    data: "codanalise="+id_analise+"&des_canalise="+descanalise,
        url: "../Model/Admin/GestaoLaboratorio/inserir_analises.php",
        success:function(resultado){
            if (resultado=="DadosDepartamentoVazio") {
                   $('#msganalise').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);
            }else if(resultado=="erro"){
                    $('#msganalise').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
            }
            else{
                jQuery('#id_analise').val("");
                jQuery('#descanalise').val("");
                $('#msganalise').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                listagemAnalises();

            }

        }
    });
});
}