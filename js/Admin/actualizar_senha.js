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

function actualizar_senha(){
console.log("click");

 $('#alterar_senha').on('click',function(){
        var antiga= jQuery('#antiga').val();
        var novacopia = jQuery('#senhaNova').val();
        var nova = jQuery('#confirmar_senha').val();
        console.log(antiga+novacopia+nova);
    $.ajax({
        type: "POST",
        data: "senhaantiga="+antiga+"&novasenha="+novacopia+"&nova="+nova,
        url: "../Model/Admin/Administracao/Actualizar_Senha.php",
        success:function(resultado){
            if(resultado=="success"){
                console.log(antiga+novacopia+nova);
                $('#msg_confiSenha').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong> Senha Alterada com sucesso.</div>').show(300).delay(5000).hide(300); 
            }else if(resultado=="diverente"){
                $('#msg_confiSenha').html('<div class="alert alert-warning" role="alert"> <strong>Alerta!</strong> As senhas não conscidem</div>').show(300).delay(5000).hide(300);
            }else if(resultado=="senhaerrada"){
                $('#msg_confiSenha').html('<div class="alert alert-warning" role="alert"> <strong>Alerta!</strong> A senha actual esta errada</div>').show(300).delay(5000).hide(300);
            }else if(resultado=="vazio"){
                $('#msg_confiSenha').html('<div class="alert alert-warning" role="alert"> <strong>Alerta!</strong>Todos os campos devem ser preenchidos</div>').show(300).delay(5000).hide(300);
            }else{
                $('#msg_confiSenha').html('<div class="alert alert-warning" role="alert"> <strong>Probleme!</strong>Ocorreu um erro contacte o Administrador{'+resultado+'}</div>').show(300).delay(5000).hide(300);             
            }
        }
    });

});
} 




