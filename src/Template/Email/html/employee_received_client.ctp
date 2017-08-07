<?php
$shipment = $edata['shipment'];
?>
  <div style="width: 100%;">
  	  	<a href="http://comfortpackaging.com/">
		  <div style="background-color: #232225;">
		  		<img style="width: 340px;" src="http://comfortpackaging.com/webroot/email/header-email-logo.jpg">
		  </div>
		</a>
		<div style="border: 1px solid #232225; padding: 24px;">	
		  	<h3>Good Day!</h3> 
			<p style="font-size: 18px;">Your shipment has been <b>received</b>. See shipment details below :</p>
			<br/>
			<div style="background-color: #232225; width: 90%;padding-top:15px;padding-bottom: 15px;text-align: center;"><span style="font-size:21px;color:white;">Shipment Details</span></div>
			<table style="width: 90%;border-right: solid 1px #232225;border-left: solid 1px #232225;border-bottom: solid 1px #232225;">
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;width: 40%;" align="center">Item Description</th>
					<td style="padding-left: 10px;text-transform:uppercase;"><?= $shipment->item_description; ?></td>
				</tr>	
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Quantity</th>
					<td style="padding-left: 10px;text-transform:uppercase"><?= $shipment->quantity; ?></td>
				</tr>	
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Boxes</th>
					<td style="padding-left: 10px;text-transform:uppercase;"><?= $shipment->boxes; ?></td>
				</tr>
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Shipping Carrier</th>
					<td style="padding-left: 10px;text-transform:uppercase;">
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
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Shipping Service</th>
					<td style="padding-left: 10px;text-transform:uppercase;">
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
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Shipping Purpose</th>
					<td style="padding-left: 10px;text-transform:uppercase;">
					<?php 
			            echo $shipment->shipping_purpose->name;
			          ?>
					</td>
				</tr>
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Remaining Quantity</th>
					<td style="padding-left: 10px;text-transform:uppercase;">
						<?= $shipment->remaining_quantity  ?>
					</td>
				</tr>
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Status</th>
					<td style="padding-left: 10px;text-transform:uppercase;">
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
				              echo "Received and Stored";
				            }
				        ?>
					</td>
				</tr>
			</table>
			<br/>
		</div>
	<p style="text-align: center;">This email was sent by <a href="http://comfortpackaging.com/">comfortpackaging.com</a></p>
  </div>