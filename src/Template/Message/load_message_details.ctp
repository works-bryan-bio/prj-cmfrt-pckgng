<?php 
  if( $hdr_user_data->photo != '' ){
      $user_photo = $this->Url->build("/webroot/upload/" . $hdr_user_data->user_id . "/" . $hdr_user_data->photo);            
  }else{
      $user_photo = $this->Url->build("/webroot/images/default_user.png");
  }
?>

<h4>
    Subject: <?= $message_header->message_subject; ?>
    <a href="javascript:void(0);" title="Refresh" alt="Refresh" class="btn btn-default btn-refresh-body-message" style="width:50%; display:inline" data-message-id="<?= $message_header->id; ?>" ><i class="fa fa-refresh"></i></a>
</h4> 
<br><br>

<div class="box-body chat" id="chat-box">
    <?php if($message_details->count() == 0) { ?>
        <div class="text-center" style="padding:15px;">Start discussion now.</div>
    <?php } ?>  
    <?php foreach($message_details as $discussion) { ?>
        <div class="item" style="padding-top:5px;">
            <!-- <span class="thumb avatar pull-left m-r">
                <img style="height:50px;" src="<?= $user_photo; ?>" class="dker" alt="...">

            </span> -->

            <p class="message" style="margin-left:0px !important;">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= date("M d, Y H:i:s", strtotime($discussion->date_created)) ?></small>
                    <?php if($hdr_user_data->user->id == $discussion->user_id) { ?>
                        <b><i>You</i></b>
                    <?php }else{ ?>
                        <?php if($discussion->user_group == 2) { ?>
                            <b><?php echo $discussion->user->user_entities[0]->firstname; ?> <?= $discussion->user->user_entities[0]->lastname; ?></b>
                        <?php }else{ ?>
                            <b><?php echo $discussion->message->client->firstname; ?> <?= $discussion->message->client->lastname; ?></b>
                        <?php } ?>
                        
                    <?php } ?>
                <br><div style="margin-left:20px;"><?= $discussion->message_details; ?></div>
            </p>
            <hr>
        </div>
        <div class="clearfix"></div>
    <?php } ?>                    
</div>
<!-- /.chat -->
<div class="box-footer" style="margin-top:10px;padding-top:10px">
    <form id="frm-send-message" onsubmit="return false;" data-toggle="validator" role="form">
        <input type="hidden" name="message_id" value="<?= $message_header->id; ?>">

        <div id="attached-files-container" style="padding:10px;">

        </div>

        <div class="input-group">
            <input class="form-control" placeholder="Type message..." name="message_details" required="required" >

            <!-- <div class="input-group-btn">
                <button type="button" class="btn btn-default has-ck-finder" title="Attach File"><i class="fa fa-paperclip"></i></button>
            </div> -->
            <div class="input-group-btn">
                <button type="submit" class="btn btn-success btn-send-message" title="Send Message"><i class="fa fa-paper-plane"></i></button>
            </div>
        
        </div>
    </form>
</div>

<script>
$(function(){

    $('.btn-refresh-body-message').click(function(){
        var message_id = $(this).attr('data-message-id');
        loadMessageDetails(message_id);
    });

    $('#frm-send-message').submit(function(evt) {
        evt.preventDefault();

        $('.btn-send-message').html("<i class='fa fa-spin fa-spinner'></i>");
        if( $('.btn-send-message').hasClass("disabled") ) {
            $('.btn-send-message').html("Save");
        }else{
            $('.btn-send-message').attr("disabled","disabled");
            $.post(base_url + "message/send",$('#frm-send-message').serialize(),function(o) {
                loadMessageDetails(o.message_id);

                $('.btn-send-message').removeAttr("disabled");
                $('.btn-send-message').html("<i class='fa fa-paper-plane'></i>");
            },"json");
        }
    });

    $('.has-ck-finder').click(function(){
        openKCFinder_textbox($(this));
    });

});

function loadChatByProjectId(project_id) {
    $('#chat-container').html('<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading project discussion...</div>');
    $.post(base_url + "clients/load_project_discussion",{project_id:project_id},function(o){
        $('#chat-container').html(o);
    });
}

function openKCFinder_textbox(field) {
    console.log(field);
    window.KCFinder = {
        callBack: function(url) {
            var filename= url.split('/').pop()
            var clean_filename = filename.replace(new RegExp("%20", 'g')," ");
            clean_filename = clean_filename.replace(new RegExp("%5", 'g'),"-");
            //alert(clean_filename);

            var append = '<span class="label label-info" style="margin-right:5px">';
                append += '<input type="hidden" name="file[]" value="'+url+'">'+clean_filename+' &nbsp;';
                append += '<a href="javascript:void(0);" class="btn-remove-attached-file"><i class="fa fa-times"></i></a>';
            append += '</span>';

            $('#attached-files-container').append(append);
            removeAttachedFileScript();
            //field.val(url);
        }
    };
    window.open(base_url+'js/kcfinder/browse.php?type=images&dir=images', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}

function removeAttachedFileScript()
{
    $('.btn-remove-attached-file').click(function(){
        $(this).closest('span').remove();
    });
}
</script>