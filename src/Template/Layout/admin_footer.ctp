<?php
	echo $this->Html->script('theme_forest/jquery.min.js');
	echo $this->Html->script('theme_forest/bootstrap.js');
	//echo $this->Html->script('theme_forest/app.js');	
    echo $this->Html->script('theme_forest/datepicker/bootstrap-datepicker.js');
	echo $this->Html->script('theme_forest/slimscroll/jquery.slimscroll.min.js');
    echo $this->Html->script('theme_forest/app.plugin.js');
	echo $this->Html->script('theme_forest/jquery.ui.touch-punch.min.js');
    echo $this->Html->script('theme_forest/file-input/bootstrap-filestyle.min.js');
	echo $this->Html->script('theme_forest/jquery-ui-1.10.3.custom.min.js');
    echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
    echo $this->Html->script('validator.js');
    echo $this->Html->script('jquery.dataTables.min');
    echo $this->Html->script('colorbox/jquery.colorbox-min.js');    
    
	//echo $this->Html->script('backend-application.js');
	//echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));	
?>	
<script type="text/javascript">
        $(function(){
            $(".modalImage").colorbox({transition:"fade"});

            //Datatable
            $('.zero-config-datatable').DataTable();

            //Shipment module
            $("#shipping_carrier_id").change(function(){
                var selected = $(this).val();
                if(selected == 4){
                    $(".other-shipping-carrier").removeClass("hidden");
                }else{
                    $(".other-shipping-carrier").addClass("hidden");
                }
            });

            $("#shipping_service_id").change(function(){
                var selected = $(this).val();
                if(selected == 4){
                    $(".other-shipping-service").removeClass("hidden");
                }else{
                    $(".other-shipping-service").addClass("hidden");
                }
            });

            $("#shipping_purpose_id").change(function(){
                var selected = $(this).val();
                if( selected == 3 ){
                    $(".send-amazon-group").removeClass('hidden');
                    $(".combine-with-group").addClass('hidden');
                }else if( selected == 5 ){                    
                    $(".combine-with-group").removeClass('hidden');
                    $(".send-amazon-group").addClass('hidden');
                }else{
                    $(".send-amazon-group").addClass('hidden');
                    $(".combine-with-group").addClass('hidden');
                } 
            });

            //End shipment module

            $('.btn-select-project-discussion').click(function(){
                var project_id = $(this).attr("data-project-id");
                var project_name = $(this).attr("data-project-name");
                $('.pr').removeClass("success");
                $(this).closest('tr').addClass('success');
                $('#discussion_name').html(project_name + " Discussion");
                $('#chat-container').html('<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading project discussion...</div>');
                $.post(base_url + "clients/load_project_discussion",{project_id:project_id},function(o){
                    $('#chat-container').html(o);
                });
            });

            $('.dt-default').datepicker({"format" : "yyyy-mm-dd"});

            $('.has-tiny-mce').removeAttr('required');
            
            $('.btn-publish-update').click(function(){
                if ($(this).children().hasClass('glyphicon-remove')) {
                  $(this).children().removeClass('glyphicon-remove');
                  $(this).children().addClass('glyphicon-check');

                  $(this).removeClass('btn-danger');
                  $(this).addClass('btn-info');

                  $(this).children().attr('title','Set as Unpublish');
                }else{
                  $(this).children().removeClass('glyphicon-check');
                  $(this).children().addClass('glyphicon-remove');

                  $(this).removeClass('btn-info');
                  $(this).addClass('btn-danger');

                  $(this).children().attr('title','Set as Publish');
                }

                var url = $(this).attr("base-url");
                var id = $(this).attr("update-id");

                $("#message-container").html('Updating...');
                $("#trigger-modal-btn").trigger("click");
                $.post(url,{id:id},
                    function(o){
                        $("#message-container").html(o.message);
                },"json");
              });

            $('.btn-cover-image-update').click(function(){
                $(".btn-cover-image").children().removeClass('fa-check');
                $(".btn-cover-image").children().addClass('fa-image');

                $(".btn-cover-image").removeClass('btn-success');
                $(".btn-cover-image").addClass('btn-info');

                $(".btn-cover-image").children().attr('title','Set as cover photo');

                $(this).children().removeClass('fa-image');
                $(this).children().addClass('fa-check');

                $(this).removeClass('btn-info');
                $(this).addClass('btn-success');

                $(this).children().attr('title','Cover image');

                var url = $(this).attr("base-url");
                var id = $(this).attr("update-id");

                $("#message-container").html('Updating...');
                $("#trigger-modal-btn").trigger("click");
                $.post(url,{id:id},
                    function(o){
                        $("#message-container").html(o.message);
                },"json");
            });

            $('.btn-featured-product-update').click(function(){             
                if ($(this).children().hasClass('fa-remove')) {
                    $(this).children().removeClass('fa-remove');
                    $(this).children().addClass('fa-check');

                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-info');

                    $(this).children().attr('title','Set as Unpublish');
                }else{
                    $(this).children().removeClass('fa-check');
                    $(this).children().addClass('fa-remove');

                    $(this).removeClass('btn-info');
                    $(this).addClass('btn-danger');

                    $(this).children().attr('title','Set as Publish');
                }

                var url = $(this).attr("base-url");
                var id = $(this).attr("update-id");

                $("#message-container").html('Updating...');
                $("#trigger-modal-btn").trigger("click");
                $.post(url,{id:id},
                    function(o){
                        $("#message-container").html(o.message);
                },"json");
            });

            $('.btn-publish-product-update').click(function(){              
                if ($(this).children().hasClass('fa-remove')) {
                    $(this).children().removeClass('fa-remove');
                    $(this).children().addClass('fa-check');

                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-info');

                    $(this).children().attr('title','Set as Unpublish');
                }else{
                    $(this).children().removeClass('fa-check');
                    $(this).children().addClass('fa-remove');

                    $(this).removeClass('btn-info');
                    $(this).addClass('btn-danger');

                    $(this).children().attr('title','Set as Publish');
                }

                var url = $(this).attr("base-url");
                var id = $(this).attr("update-id");

                $("#message-container").html('Updating...');
                $("#trigger-modal-btn").trigger("click");
                $.post(url,{id:id},
                    function(o){
                        $("#message-container").html(o.message);
                },"json");
            });

            $('.has-ck-finder').click(function(){
                openKCFinder_textbox($(this));
            });

            <?php if(isset($load_project_discussion_script)) { ?>
                loadProjectDiscussionAdmin(<?= $project->id; ?>);
            <?php } ?>

            <?php if(isset($load_project_proposal_discussion_script)) { ?>
                loadProjectProposalDiscussionAdmin(<?= $project_proposal->id; ?>);
            <?php } ?>

            <?php if(isset($load_client_project_proposal_discussion_script)) { ?>
                loadProjectProposalDiscussionClient(<?= $project_proposal->id; ?>);
            <?php } ?>

            $('.send_option').change(function(){
                var send_option = $(this).val();
                $('.send-to-amazon-qty-container').hide();
                if(send_option == 'combine_with_shipment'){
                    $('.shipment-combine-container').show();
                    $('.send-to-amazon-container').hide();
                }else if(send_option == 'send_to_amazon' || send_option == 'send_part_of_it_to_amazon'){
                    $('.send-to-amazon-container').show();
                    $('.shipment-combine-container').hide();

                    if(send_option == 'send_part_of_it_to_amazon'){
                        $('.send-to-amazon-qty-container').show();
                    }
                }else{
                    $('.send-to-amazon-container').hide();
                    $('.shipment-combine-container').hide();
                }
            });

            $('#toggle_combine_inventory').change(function(){
                var send_option = document.getElementById('toggle_combine_inventory').checked
                if(send_option == true){
                    $('#combine_inventory_order_id').show();
                    $('#combine_comment').show();
                    $('.combine_inventory').show();
                }else{
                    $('#combine_inventory_order_id').hide();
                    $('#combine_comment').hide();
                    $('.combine_inventory').hide();
                }
            });

            $('.btn-show-order-form').click(function(){
                var shipment_id = $(this).attr('data-shipment-id');
                var remaining_quantity = $(this).attr('data-remaining-quantity');
                var shipment_desc = $(this).attr('data-shipment-desc');
                var sent_quantity = $(this).attr('data-sent-quantity');
                var status = $(this).attr('data-shipment-status');

                $('.shipment-desc').html(shipment_desc);
                $('.shipment-sent-quantity-desc').html(sent_quantity);
                $('.shipment-remaining-quantity-desc').html(remaining_quantity);
                $('.shipment-status-desc').html(status);

                $('#inp_shipment_id').val(shipment_id);
                $('#total_remaining').val(remaining_quantity);
                $('.send-new-order-container').show();
                
            });

            $('.btn-hide-order-form').click(function(){
                $('.send-new-order-container').hide();
            });

            

        });

        $(function(){
            //$.fn.modalmanager.defaults.resize = true;  
        });

        CKEDITOR.replace( 'ckeditor', {
            width: '600'
        });

        function openKCFinder_textbox(field) {
            console.log(field);
            window.KCFinder = {
                callBack: function(url) {
                    field.val(url);
                }
            };
            window.open(base_url+'js/kcfinder/browse.php?type=images&dir=images', 'kcfinder_textbox',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }

        function loadProjectDiscussionAdmin(project_id) {
            $.post(base_url + "clients/load_project_discussion",{project_id:project_id},function(o){
                $('#chat-container').html(o);
            });
        }

        function loadProjectProposalDiscussionAdmin(project_proposal_id) {
            $.post(base_url + "project_proposals/load_project_proposal_discussion",{project_proposal_id:project_proposal_id},function(o){
                $('#chat-container').html(o);
            });
        }

        function loadProjectProposalDiscussionClient(project_proposal_id) {
            $.post(base_url + "clients/load_project_proposal_discussion",{project_proposal_id:project_proposal_id},function(o){
                $('#chat-container').html(o);
            });
        }

        function updateReceivedOption(id){
                var form_name = "#formModalShipments-" + id;
                var send_option  = $(form_name).find(".send_option").val(); //$(".send_option").val();
                $('.send-to-amazon-qty-container').hide();
                if(send_option == 'combine_with_shipment'){
                    $('.shipment-combine-container').show();
                    $('.send-to-amazon-container').hide();
                }else if(send_option == 'send_to_amazon' || send_option == 'send_part_of_it_to_amazon'){
                    $('.send-to-amazon-container').show();
                    $('.shipment-combine-container').hide();

                    if(send_option == 'send_part_of_it_to_amazon'){
                        $('.send-to-amazon-qty-container').show();
                    }
                }else{
                    $('.send-to-amazon-container').hide();
                    $('.shipment-combine-container').hide();
                }     
        }

    </script>