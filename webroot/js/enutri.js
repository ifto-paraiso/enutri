
// Desabilita os botões submit após serem acionados para evitar flood
$('form').submit(function(){
    $(this).find('[type="submit"]').attr('disabled', true);
});
