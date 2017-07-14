<table class="table table-hover table-stripped">
    <tr>
    	<?php if($is_manager) { ?>
    		<th>Client</th>
    	<?php } ?>
        <th width="50%">Subject</th>
        <th width="30%">Date Created</th>
    </tr>
    <?php foreach($message_header as $mh) { 

        if($is_manager){
             if($mh['user_id'] != $mh['last_user_id']){   ?>
        	   <tr class="tr-show-message-details" data-message-id="<?= $mh['m_id']; ?>" style="cursor:pointer;">
            <?php }else{ ?>     
               <tr class="tr-show-message-details" data-message-id="<?= $mh['m_id']; ?>" style="cursor:pointer; font-weight: bold;">
            <?php }  
          }else{  

             if($mh['user_id'] == $mh['last_user_id']){   ?>
               <tr class="tr-show-message-details" data-message-id="<?= $mh['m_id']; ?>" style="cursor:pointer;">
            <?php }else{ ?>     
               <tr class="tr-show-message-details" data-message-id="<?= $mh['m_id']; ?>" style="cursor:pointer; font-weight: bold;">
            <?php }  

          }  ?>  



    		<?php if($is_manager) { ?>
	    		<td><?= $mh['firstname']; ?> <?= $mh['lastname']; ?></td>
	    	<?php } ?>
    		<td><?= $mh['message_subject']; ?></td>
    		<td><?= date("F d, Y h:i a", strtotime($mh['date_created'])); ?></td>
    	</tr>
    <?php } ?>
</table>

<script>
$(function(){
	$('.tr-show-message-details').click(function(){
		var message_id = $(this).attr('data-message-id');
		loadMessageDetails(message_id);
	});
});

function loadMessageDetails(message_id) {
    $('#chat-container').html('<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading messages...</div>');
    $.post(base_url + "message/load_message_details",{message_id:message_id},function(o){
        $('#chat-container').html(o);

    });
}
</script>