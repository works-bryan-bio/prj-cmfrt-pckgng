<?php
	echo $this->Html->script('theme_forest/jquery.min.js');

	echo $this->Html->script('theme_forest/bootstrap.js');

	//echo $this->Html->script('theme_forest/app.js');	
    echo $this->Html->script('theme_forest/datepicker/bootstrap-datepicker.js');
	echo $this->Html->script('theme_forest/slimscroll/jquery.slimscroll.min.js');
    echo $this->Html->script('theme_forest/app.plugin.js');
	echo $this->Html->script('theme_forest/jquery.ui.touch-punch.min.js');
    echo $this->Html->script('app.min.js');
    echo $this->Html->script('theme_forest/file-input/bootstrap-filestyle.min.js');
	echo $this->Html->script('theme_forest/jquery-ui-1.10.3.custom.min.js');
    echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
    echo $this->Html->script('validator.js');
    echo $this->Html->script('jquery.dataTables.min');
    echo $this->Html->script('colorbox/jquery.colorbox-min.js');   

    if(isset($load_message_script)){
        echo $this->Html->script('message.js');     
    } 

	//echo $this->Html->script('backend-application.js');
	//echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));	
?>	
<script type="text/javascript">
        $(function(){
            $(".modalImage").colorbox({transition:"fade"});
            refreshShippingPurpose();
            loadVerifyOrderDue();
            loadVerifyDue();


            // Javascript to enable link to tab
            var url = document.location.toString();
            if (url.match('#')) {
                $('.nav-tabs a[href="#'+url.split('#')[1]+'"]').tab('show') ;
            } 

            // With HTML5 history API, we can easily prevent scrolling!
            $('.nav-tabs a').on('shown.bs.tab', function (e) {
                if(history.pushState) {
                    history.pushState(null, null, e.target.hash); 
                } else {
                    window.location.hash = e.target.hash; //Polyfill for old browsers
                }
            })

            //Datatable
            $('.zero-config-datatable').DataTable({
                "fnDrawCallback": function( settings ) {
                    redrawnFunction();
                }
            });

            $('.zero-config-datatable-user-dash').DataTable({
                
                "fnDrawCallback": function( settings ) {
                    redrawnFunction();
                }
            });

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
                    $(".send-amazon-only-group").addClass('hidden');  
                }else if( selected == 5 ){                    
                    $(".combine-with-group").removeClass('hidden');
                    $(".send-amazon-group").addClass('hidden');
                    $(".send-amazon-only-group").addClass('hidden');  
                }else if( selected == 2 ){                    
                    $(".combine-with-group").addClass('hidden');
                    $(".send-amazon-group").addClass('hidden');
                    $(".send-amazon-only-group").removeClass('hidden');    
                }else{
                    $(".send-amazon-group").addClass('hidden');
                    $(".combine-with-group").addClass('hidden');
                    $(".send-amazon-only-group").addClass('hidden'); 
                } 
            });

            //tooltip
            $('[data-toggle="tooltip"]').tooltip(); 

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

            redrawnFunction();

            $('#upc_number').keyup(function(){
                var upc_number = $('#upc_number').val();
                var combine_id = $('.combine_with_id').val();
               

                var shipping_purpose_id = $('#shipping_purpose_id').val();

                if(shipping_purpose_id == 5){
                     alert(shipping_purpose_id);
                    var item_description = $('#item_description').val();
                    var quantity = $('#quantity').val();
                    loadVerifyUpcPriceCombine(upc_number,combine_id,item_description,quantity);
                }else{
                   loadVerifyUpcPrice(upc_number);
                }

            });

             $('#all_shipment').change(function(){
                var shipment_id = $('#all_shipment').val();
                 loadVerifyUpcOrderPrice(shipment_id);
                // var shipping_purpose_id = $('#shipping_purpose_id').val();

                // if(shipping_purpose_id == 5){
                //     var item_description = $('#item_description').val();
                //     var quantity = $('#quantity').val();
                //     loadVerifyUpcPriceCombine(upc_number,combine_id,item_description,quantity);
                // }else{
                //    loadVerifyUpcPrice(upc_number);
                // }

            });

             $('#order_quantity').keyup(function(){
                var shipment_id = $('#all_shipment').val();
                loadVerifyUpcOrderPrice(shipment_id);
                // var shipping_purpose_id = $('#shipping_purpose_id').val();

                // if(shipping_purpose_id == 5){
                //     var item_description = $('#item_description').val();
                //     var quantity = $('#quantity').val();
                //     loadVerifyUpcPriceCombine(upc_number,combine_id,item_description,quantity);
                // }else{
                //    loadVerifyUpcPrice(upc_number);
                // }

            });

              $('#order_quantity').change(function(){
                var shipment_id = $('#all_shipment').val();
                 loadVerifyUpcOrderPrice(shipment_id);
                // var shipping_purpose_id = $('#shipping_purpose_id').val();

                // if(shipping_purpose_id == 5){
                //     var item_description = $('#item_description').val();
                //     var quantity = $('#quantity').val();
                //     loadVerifyUpcPriceCombine(upc_number,combine_id,item_description,quantity);
                // }else{
                //    loadVerifyUpcPrice(upc_number);
                // }

            });

            $('.combine_with_id').change(function(){
                var upc_number = $('#upc_number').val();
                var combine_id = $('.combine_with_id').val();
                var item_description = $('#item_description').val();
                var quantity = $('#quantity').val();
                loadVerifyUpcPriceCombine(upc_number,combine_id,item_description,quantity);
            });   

            $('.btn-edit-bill-lading').click(function(){
                $('.btn-cancel-edit-bill-lading').show();
                $('.btn-action-bill-lading').html('Update');
                $('.edit_mode').val("on");
                $('.bill_lading_file').val($(this).attr("data-bill-lading-file"));
                $('.old_bill_lading_file').val($(this).attr("data-bill-lading-file"));
                $('.date_upload').val($(this).attr("data-date-upload"));
                $('.remarks').val($(this).attr("data-remarks"));
            });

            $('.btn-cancel-edit-bill-lading').click(function(){
                $('.btn-cancel-edit-bill-lading').hide();
                $('.btn-action-bill-lading').html('Submit');
                $('.edit_mode').val("off");
                $('.bill_lading_file').val("");
                $('.old_bill_lading_file').val("");
                $('.date_upload').val("");
                $('.remarks').val("");
            });

            $('.btn-bill-lading').click(function(){
                $('.btn-cancel-edit-bill-lading').trigger('click');
            });

        });

        

        $(function(){
            //$.fn.modalmanager.defaults.resize = true;  
        });

        CKEDITOR.replace( 'ckeditor', {
            width: '600'
        });

        function redrawnFunction()
        {
            $('.dt-default').datepicker({"format" : "yyyy-mm-dd"});

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

                
                $('#all_shipment').val(shipment_id);
                $('.shipment-desc').html(shipment_desc);
                $('.shipment-sent-quantity-desc').html(sent_quantity);
                $('.shipment-remaining-quantity-desc').html(remaining_quantity);
                $('.shipment-status-desc').html(status);

                $('#inp_shipment_id').val(shipment_id);
                $('#total_remaining').val(remaining_quantity);
                $('#dropdown-shipments-list').hide();
                $('.single-shipment-desc').show();
                $('.send-new-order-container').show();
                
            });

            $('#btn-new-inventory-order-accordion').click(function(){
                $('#inp_shipment_id').val($('#all_shipment').val());
                $('.single-shipment-desc').hide();
                $('#dropdown-shipments-list').show();
                $('.send-new-order-container').show();
            });

            $('#btn-new-bundle-inventory-order-accordion').click(function(){
                $('#inp_shipment_id').val($('#all_shipment').val());
                $('.single-shipment-desc').hide();
                $('#dropdown-bundle-shipments-list').show();
                $('.send-new-bundle-order-container').show();
            });

            $('#all_shipment').change(function(){
                $('#inp_shipment_id').val($(this).val());
            });

            $('.btn-hide-order-form').click(function(){
                $('.send-new-order-container').hide();
            });

            $('.btn-hide-bundle-order-form').click(function(){
                $('.send-new-bundle-order-container').hide();
            });

            $('.rbtn-correct-quantity').change(function(){
                var val = $(this).val();
                if(val == 1) {
                    $('.correct_quantity_container').hide();
                }else{
                    $('.correct_quantity_container').show();
                }
            });
        }

        function openKCFinder_textbox(field) {      
          window.KCFinder = {
                  callBack: function(url) {
                    var filename= url.split('/').pop()
                    var clean_filename = filename.replace(new RegExp("%20", 'g')," ");

                    var extension = clean_filename.split('.').pop().toUpperCase();
                    if (extension == "PNG" || extension == "JPG" || extension == "JPEG" || extension == "BMP"){
                      //$(".img-attachment").attr("src",url);
                    }else{
                      //$(".img-attachment").attr("src",DEFAULT_IMG);
                    }
          
                    field.val(url);
                  }
            };

            window.open(base_url+'js/kcfinder/browse.php?type=files&dir=files', 'kcfinder_textbox',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }

        /*function openKCFinder_textbox(field) {
            console.log(field);
            window.KCFinder = {
                callBack: function(url) {
                    field.val(url);
                }
            };
            window.open(base_url+'js/kcfinder/browse.php?type=files&dir=files', 'kcfinder_textbox',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }*/

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

        function loadVerifyUpcPrice(upc_number) {
            $.post(base_url + "shipments/load_verify_upc_number",{upc_number:upc_number},function(o){
                var qty =  $('#quantity').val();
                //alert(qty);
                if(qty == ''){
                    qty = 0;
                }
                var total_price = qty * o.per_piece;
                $('#price').val(total_price);
                if(total_price == 0){
                  $('#price_text').html('We will update you on price soon.');
                }else{
                    $('#price_text').html('');
                }
            },"json");
        }

        function loadVerifyUpcPriceCombine(upc_number,combine_id,item_description,quantity) {
            $.post(base_url + "shipments/load_verify_upc_number_combine",{upc_number:upc_number, combine_id:combine_id, item_description:item_description, quantity:quantity},function(o){
                var qty =  $('#quantity').val();
                //alert(qty);
                if(qty == ''){
                    qty = 0;
                }
                var total_price = qty * o.per_piece;
                $('#price').val(total_price);
                if(total_price == 0){
                  $('#price_text').html('We will update you on price soon.');
                }else{
                    $('#price_text').html('');
                }
            },"json");
        }

        function loadVerifyUpcOrderPrice(shipment_id) {
            $.post(base_url + "shipments/load_verify_upc_number_order_inventory",{shipment_id:shipment_id},function(o){
                var qty =  $('#order_quantity').val();
                //alert(qty);
                if(qty == ''){
                    qty = 0;
                }
                var total_price = qty * o.per_piece;
                $('#order_price').val(total_price);

                if(total_price == 0){
                  $('#price_text').html('We will update you on price soon.');
                }else{
                    $('#price_text').html('');
                }
            },"json");
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

        function otherShipmentOptions(){
              var ship =  $('.shipping-instruction').is(':checked');
                if(ship == true){
                   $(".option-shipping-others").removeClass("hidden");
                }else{
                   $(".option-shipping-others").addClass("hidden");
                }
        }

        function refreshShippingPurpose(){
            
             var selected = $("#shipping_purpose_id").val();
                if( selected == 3 ){
                    $(".send-amazon-group").removeClass('hidden');
                    $(".combine-with-group").addClass('hidden');
                    $(".send-amazon-only-group").addClass('hidden');  
                }else if( selected == 5 ){                    
                    $(".combine-with-group").removeClass('hidden');
                    $(".send-amazon-group").addClass('hidden');
                    $(".send-amazon-only-group").addClass('hidden');  
                }else if( selected == 2 ){                    
                    $(".combine-with-group").addClass('hidden');
                    $(".send-amazon-group").addClass('hidden');
                    $(".send-amazon-only-group").removeClass('hidden');    
                }else{
                    $(".send-amazon-group").addClass('hidden');
                    $(".combine-with-group").addClass('hidden');
                    $(".send-amazon-only-group").addClass('hidden'); 
                } 

        }

        function loadVerifyOrderDue() {
                       
            $.post(base_url + "shipments/load_verify_order_due",{},function(o){
                
                $('.number-of-order-due').html(o.quantity);
            },"json");


        }

         function loadVerifyDue() {
               
            $.post(base_url + "shipments/load_verify_due",{},function(o){
                $('.shipment-order-due').html(o.shipment_quantity);
                $('.number-of-order-due').html(o.quantity);
                $('.number-of-message').html(o.message);
                $('.total-notification').html(o.total_notification);
                $('.number-of-amazon').html(o.amazon_count);
            },"json");


        }

        
    </script>