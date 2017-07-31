<?php
$order = $edata['order'];
?>
<p>Hi,</p> 
<p>Your order has been <b>completed</b>. See order details below.</p>
<br>
<table border="0">
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Order ID</th>
		<td><?= $order->order_number; ?></td>
	</tr>	
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Item Description</th>
		<td><?= $order->shipment_id ." - ". $order->shipment->item_description ?></td>
	</tr>	
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Order Destination</th>
		<td><?= $order->order_destination; ?></td>
	</tr>
	<tr>
		<th style="background-color: #cccccc; color: #ffffff; padding: 15px;" align="center">Order to be Sent</th>
		<td><?= $order->date_created; ?></td>
	</tr>
	
</table>
<br/><br/>
<p>This email was sent by <a href="http://comfortpackaging.com/">comfortpackaging.com</a></p>