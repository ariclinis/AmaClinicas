function ListarProvincias(){
    var dados = $(".provincias");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoProvincias/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".provincias");
                        dados.append("<option value="+val.Descricao+">"+val.Descricao+"</option>");
                    });
                }
            });
}
function ListarMunicipios(){
    var dados = $(".municipios");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoMunicipios/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);

                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".municipios");
                        dados.append("<option value="+val.Descricao+">"+val.Descricao+"</option>");
                    });
                }
            });
}
function ListarBairros(){
    var dados = $(".bairros");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoBairros/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".bairros");
                        dados.append("<option value="+val.Descricao+">"+val.Descricao+"</option>");
                    });
                }
            });
}

function ListarClientes(){
    var dados = $(".clientes");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/Listagem_Clientes.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".clientes");
                        dados.append("<option value="+val.id+">"+val.Cliente+"</option>");
                    });
                }
            });
}

function ListarProdutos(){
    var dados = $(".produtos");
     dados.html("<option value=''>Selecione o producto</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagem_produtos.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha1 = $(".produtos");
                        dados.append("<option value="+val.id+">"+val.nomeproduto+"</option>");
                    });
                }
            });
}

function ListarProduto_codigo(){
    var dados = $(".codproduto");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagem_produtos.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".codproduto");
                        dados.append("<option value="+val.id+">"+val.Cod_Produto+"</option>");
                    });
                }
            });
}



function ListarEspecialidades(){
var dados = $(".especialidades");
dados.html("");
$.ajax({
type: "GET",
data: "",
url: "../Model/Admin/GestaoEspecialidades/listagem.php",
success: function (result) {
var resultadoObj= JSON.parse(result);
$.each(resultadoObj,function(key,val){
var novaLinha = $(".especialidades");
dados.append("<option value="+val.id+"­>"+val.Descricao+"</option>");

});
}
});
}


function ListagemPacientes(){
var dados = $(".listarpacientes");
dados.html("");
$.ajax({
           type: "GET",
           data: "",
           url: "../Model/Admin/GestaoPacientes/listagem.php",
           success: function (result) {
           var resultadoObj= JSON.parse(result);
           $.each(resultadoObj,function(key,val){
           var novaLinha = $(".listarpacientes");
dados.append("<option value="+val.id+"­>"+val.Nome_Paciente+"</option>");

});
}
});
}

function listagemAnalises(){
    var dados = $(".listaAnalises");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoLaboratorio/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".listaAnalises");
                        dados.append("<input type='checkbox' id='analise[]' name='analise[]' value="+val.ID+">"+val.DescAnalise+"<br>");
                    });
                }
            });
}
    function listagemMedicos(){
    var dados = $(".listaMedicos");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoMedicos/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".listaMedicos");
                        dados.append("<option value="+val.ID+">"+val.nome+"</option>");
                    });
                }
            });
}


function contagempacientes(){
    var dados = $(".listtotalpac");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoEstatisticas/Contar_Pacientes.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".listtotalpac");
                        dados.append(""+val.qtd+"");
                    });
                }
            });
}