//Verifica se o input esta vazio
$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});

//LIstagem de Pacientes
function listagemDados(){
    var dados = $("#corpo");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoPacientes/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' target='_blank' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoPacientes/paciente_ficha.php?cod_paciente="+val.id+"'>Imprimir ficha</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.genero+"</td><td>"+val.n_bi+"</td><td>"+val.idade+"</td><td>"+val.estado+"</td><td>"+val.data_registo+"</td><td>"+val.Nome_User+"</td><td><button id="+val.id+" class='btn btn-outline btn-danger btn-sm'>Eliminar</button> <button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar </button>"+btnOutros+" </tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}


// Inserir Pacientes

function inserirPaciente(){

 $('#Cadastro').on('click',function(){
     var nome = jQuery('#nome').val();
        var nomemae = jQuery('#nome_mae').val();
        var nomepai = jQuery('#nome_pai').val();
        var bi = jQuery('#bi').val();
        var datanasc = jQuery('#Data_nasc').val();
        var genero = jQuery('#genero').val();
        var nacio = jQuery('#nacio').val();
        var obs = jQuery('#obs').val();
        var provloca = jQuery('#provincia_localidade').val();
        var muniloca = jQuery('#municipio_localidade').val();
        var bairro = jQuery('#bairro').val();
        var phone = jQuery('#telefone').val();
        var email = jQuery('#email').val();
    $.ajax({
        type: "POST",
        data: "nome="+nome+"&nomemae="+nomemae+"&nomepai="+nomepai+"&bi="+bi+"&datanasc="+datanasc+"&genero="+genero+"&nacio="+nacio+"&obs="+obs+"&muniloca="+muniloca+"&provloca="+provloca+"&bairro="+bairro+"&phone="+phone+"&email="+email,
        url: "../Model/Admin/GestaoPacientes/inserir.php",
        success:function(resultado){
            if (resultado=="DadosPessoaisVazio" || resultado=="InformacoesAdicionaisVazio" || resultado=="ContactosVazio") {
                   $('#msg').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);

            }else if(resultado=="erro"){

                    $('#msg').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);

            }
            else{
                $('#msg').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                window.setTimeout("location.href='./Paciente_Listagem.php'",4000);
            }

        }
    });

});
}