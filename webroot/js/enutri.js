
$(document).ready(function(){
    
    // Fecha as mensagens flash automaticamente após o tempo especificado
    setTimeout(function(){
        $('.flash').fadeOut();
    }, 7000);
    
});

// Desabilita os botões submit após serem acionados para evitar flood
$('form').submit(function(){
    $(this).find('[type="submit"]').attr('disabled', true);
});
