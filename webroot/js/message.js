$(function(){
	loadMessageHeader();

	$('.btn-refresh-header-message').click(function(){
		loadMessageHeader();
	})
});

function loadMessageHeader() {
    $('#chat-container').html('<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading messages...</div>');
    $.post(base_url + "message/load_message_header",{},function(o){
        $('#chat-container').html(o);
    });
}
