$('.ui.dropdown')
  .dropdown()
;
$('.ui.checkbox')
  .checkbox()
;
$('.ui.accordion')
  .accordion()
;
$('.activating.element')
  .popup()
;
$('.ui.modal')
  .modal('show')
;
$("#funcionario_habitacao_cep").focusout(function(){
  //Início do Comando AJAX
  $.ajax({
      //O campo URL diz o caminho de onde virá os dados
      //É importante concatenar o valor digitado no CEP
      url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
      //Aqui você deve preencher o tipo de dados que será lido,
      //no caso, estamos lendo JSON.
      dataType: 'json',
      //SUCESS é referente a função que será executada caso
      //ele consiga ler a fonte de dados com sucesso.
      //O parâmetro dentro da função se refere ao nome da variável
      //que você vai dar para ler esse objeto.
      success: function(resposta){
          //Agora basta definir os valores que você deseja preencher
          //automaticamente nos campos acima.
          $("#funcionario_habitacao_endereco").val(resposta.logradouro);
          $("#funcionario_habitacao_bairro").val(resposta.bairro);
          $("#funcionario_habitacao_cidade").val(resposta.localidade);
          //Vamos incluir para que o Número seja focado automaticamente
          //melhorando a experiência do usuário
          $("#funcionario_habitacao_endereco").autofocus();
      }
  });
});
