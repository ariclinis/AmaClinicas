function listagemDepartamentos(){
    var dados = $("#corpo_departamento");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoDepartamentos/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Outras operações<span class='caret'></span></button><ul class='dropdown-menu'><li><a href=''>Imprimir ficha</a></li><li><a href=''>Ver historial</a></li></ul></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.codigo+"</td><td>"+val.descricao+"</td><td><button id="+val.id+" class='btn btn-outline btn-danger btn-sm'>Eliminar</button> <button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar </button></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}
function inserirDepartamento(){

 $('#Cadastro_departamento').on('click',function(){
        var codigoEspe = jQuery('#codigoDepartamento').val();
        var descricaoEspe = jQuery('#descricaoDepartamento').val();
        
    $.ajax({
        type: "POST",
        data: "codigo="+codigoEspe+"&descricao="+descricaoEspe,
        url: "../Model/Admin/GestaoDepartamentos/inserir.php",
        success:function(resultado){
            if (resultado=="DadosDepartamentoVazio") {
                   $('#msg_departamento').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);

            }else if(resultado=="erro"){

                    $('#msg_departamento').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);

            }
            else{
                jQuery('#codigoDepartamento').val("");
                jQuery('#descricaoDepartamento').val("");
                $('#msg_departamento').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                listagemDepartamentos();
                    
                
            }

        }
    });
});
}