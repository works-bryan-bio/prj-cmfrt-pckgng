
  <div style="width: 100%;">
  	  	<a href="http://comfortpackaging.com/">
		  <div style="background-color: #232225;">
		  		<img style="width: 340px;" src="http://comfortpackaging.com/webroot/email/header-email-logo.jpg">
		  </div>
		</a>
		<div style="border: 1px solid #232225; padding: 24px;">	
		  	<h3>Good Day!</h3> 
			<p style="font-size: 18px;">A new invoice (Invoice#<?= $edata->id ?>) has been generated and available in your login. See invoice details below.</p>
			<br/>
			<div style="background-color: #232225; width: 90%;padding-top:15px;padding-bottom: 15px;text-align: center;"><span style="font-size:21px;color:white;">Invoice Details</span></div>
			<table style="width: 90%;border-right: solid 1px #232225;border-left: solid 1px #232225;border-bottom: solid 1px #232225;">
				<tr>
					<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;width: 40%;" align="center">Bill to</th>
					<td style="padding-left: 10px;text-transform:uppercase;"><?= $client->firstname; ?> <?= $client->lastname; ?></td>
				</tr>	
				<?php if($edata->shipment_order == 1) { ?>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Invoiced</th>
						<td style="padding-left: 10px;text-transform:uppercase">Yes</td>
					</tr>
				<?php }else { ?>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Order</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $order_details->order_number; ?></td>
					</tr>	
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Billing Address</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->billing_address; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Terms</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->terms; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Invoice Date</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->invoice_date; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Due Date</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->due_date; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Product Services</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->product_services; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Description</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->description; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Quantity</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->quantity; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Rate</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->rate; ?></td>
					</tr>
					<tr>
						<th style="text-transform:uppercase;background-color: #232225; color: #ffffff; padding: 15px;" align="center">Balance Due</th>
						<td style="padding-left: 10px;text-transform:uppercase"><?= $edata->balance_due; ?></td>
					</tr>
				<?php } ?>
				
			</table>
			<br/>
		</div>
	<p style="text-align: center;">This email was sent by <a href="http://comfortpackaging.com/">comfortpackaging.com</a></p>
  </div>