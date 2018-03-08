$('.ticket-img').click(function() {
    code = $(this).attr('code');
    $('#qrcode-url').attr('src','/api/qrcode/'+code);
    $('#qrcode-modal').modal();
});