<?php
$order = $edata['order'];
?>
  <div style="width: 100%;">
  	  	<a href="http://comfortpackaging.com/">
		  <div style="background-color: #232225;">
		  		<img style="width: 340px;" src="http://comfortpackaging.com/webroot/email/header-email-logo.jpg">
		  </div>
		</a>
		<div style="border: 1px solid #232225; padding: 24px;">	
		  	<h3>Good Day!</h3> 
			<p style="font-size: 18px;">Your order has been <b>completed</b>. See order details below.</p>
			<br/>
			<div style="background-color: #232225; width: 90%;padding-top:15px;padding-bottom: 15px;text-align: center;"><span style="font-size:21px;color:white;">Order Details</span></div>
			<table style="width: 90%;border-right: solid 1px #232225;border-left: solid 1px #232225;border-bottom: solid 1px #232225;">
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;width: 40%;" align="center">Order ID</th>
					<td style="padding-left: 10px;text-transform:uppercase;"><?= $order->order_number; ?></td>
				</tr>	
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Item Description</th>
					<td style="padding-left: 10px;text-transform:uppercase"><?= $order->shipment_id ." - ". $order->shipment->item_description ?></td>
				</tr>	
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Order Destination</th>
					<td style="padding-left: 10px;text-transform:uppercase;"><?= $order->order_destination; ?></td>
				</tr>
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Order to be Sent</th>
					<td style="padding-left: 10px;text-transform:uppercase;"><?= $order->date_created; ?></td>
				</tr>
			</table>
			<br/>
		</div>
	<p style="text-align: center;">This email was sent by <a href="http://comfortpackaging.com/">comfortpackaging.com</a></p>
  </div>