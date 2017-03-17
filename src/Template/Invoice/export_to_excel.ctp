<h2>Invoice List</h2>
<table class="zero-config-datatable display">
    <thead>
        <tr class="heading">          
          <th class="data-id">ID</th>
          <th class="">Shipment ID</th>
          <th class="">Client ID</th>
          <th class="">Terms</th>
          <th class="">Status</th>
          <th class="">Invoice Date</th>
          <th class="">Due Date</th>
          <th class="">Product Services</th>                     
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoiceList as $invoice): ?>
        <tr>         
          <td><?= $this->Number->format($invoice->id) ?></td>
          <td><?= $invoice->has('shipment') ? $this->Html->link($invoice->shipment->id ." - ". $invoice->description, ['controller' => 'Shipments', 'action' => 'view', $invoice->shipment->id]) : '' ?></td>
          <td><?= $invoice->has('client') ? $this->Html->link($invoice->client->firstname ." ". $invoice->client->lastname , ['controller' => 'Clients', 'action' => 'view', $invoice->client->id]) : '' ?></td>
          <td><?= h($invoice->terms) ?></td>
          <td><?php  if($invoice->status == 1) { echo "Pending"; }else{ echo "Completed"; } ?></td>
          <td><?= h($invoice->invoice_date) ?></td>
          <td><?= h($invoice->due_date) ?></td>
          <td><?= h($invoice->product_services) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
header("Content-type: application/vnd.ms-excel;charset=UTF-8");
header("Content-Disposition: attachment; filename=invoice_list.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>