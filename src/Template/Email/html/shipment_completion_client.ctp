<?php
$shipment = $edata['shipment'];
?>
<p>Hi,</p> 
<p>Your shipment has been <b>completed</b>. See shipment details below.</p>
<br>
<table border="0">
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Item Description</th>
		<td><?= $shipment->item_description; ?></td>
	</tr>	
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Quantity</th>
		<td><?= $shipment->quantity; ?></td>
	</tr>	
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Boxes</th>
		<td><?= $shipment->boxes; ?></td>
	</tr>
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Shipping Carrier</th>
		<td>
		<?php
			if( $shipment->shipping_carrier_id == 4 ){
              echo $shipment->shipping_carrier->name . " - " . $shipment->other_shipping_carrier;
            }else{
              echo $shipment->shipping_carrier->name;
            }
		?>
		</td>
	</tr>
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Shipping Service</th>
		<td>
			<?php 
	            if( $shipment->shipping_service_id == 4 ){
	              echo $shipment->shipping_service->name . " - " . $shipment->other_shipping_service;
	            }else{
	              echo $shipment->shipping_service->name;
	            }                            
	        ?>
		</td>
	</tr>
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Shipping Purpose</th>
		<td>
			<?php 
	            echo $shipment->shipping_purpose->name;
	          ?>
		</td>
	</tr>
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Status</th>
		<td>
			<?php 
                             
	            if( $shipment->shipment->status == 1 ){
	              echo "Pending";
	            }elseif($shipment->shipment->status == 3){
	              echo "Received and Stored";
	            }elseif($shipment->shipment->status == 4){
	              if(strtotime(date("Y-m-d")) <= strtotime($shipment->shipment->amazon_shipment_date)) { 
	                echo "Temporary Storage";
	              }else{
	                echo "Received-Pending";
	              } 
	            }elseif($shipment->shipment->status == 5){
	              echo "Cancelled";
	            }else{
	              echo "Completed";
	            }
	        ?>
		</td>
	</tr>
</table>
<br/><br/>
<p>This email was sent by <a href="http://comfortpackaging.com/">comfortpackaging.com</a></p>