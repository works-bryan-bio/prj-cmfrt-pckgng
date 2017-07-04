<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Shipment') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Shipments') ?>
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> <?= __('View') ?>
            </li>
        </ol>       
    </div>
</div>
<?php 
    // debug($shipment);
    // exit;
?>


<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <td><?= __('Shipping Carrier') ?></th>
            <td><?= $shipment->has('shipping_carrier') ? $this->Html->link($shipment->shipping_carrier->name, ['controller' => 'ShippingCarriers', 'action' => 'view', $shipment->shipping_carrier->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Shipping Service') ?></th>
            <td><?= $shipment->has('shipping_service') ? $this->Html->link($shipment->shipping_service->name, ['controller' => 'ShippingServices', 'action' => 'view', $shipment->shipping_service->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Shipping Purpose') ?></th>
            <td><?= $shipment->shipping_purpose->name ?></td>
        </tr> 
        <?php if( $shipment->shipping_purpose_id == 2 ){ ?>
          <tr>
            <td><?= __('Amazon Shipment Date') ?></th>
            <td><?= $shipment->amazon_shipment_date == '' ? '-' : $shipment->amazon_shipment_date ?></td>
          </tr>   
          <tr>
            <td><?= __('Amazon Shipment Note') ?></th>
            <td><?= $shipment->amazon_shipment_note == '' ? '-' : $shipment->amazon_shipment_note ?></td>
          </tr>   
        <?php } ?>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($shipment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Id') ?></th>
            <td><?= $this->Number->format($shipment->client_id) . " - " . $shipment->client->firstname . " " . $shipment->client->lastname  ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($shipment->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Boxes') ?></th>
            <td><?= $this->Number->format($shipment->boxes) ?></td>
        </tr>

          <?php if($shipment->combine_in_pack== "yes"){ ?>
          <tr>
              <th><?= __('Quantity Per Pack') ?></th>
              <td><?= $this->Number->precision($shipment->quantity_per_pack,2) ?></td>
          </tr>
          <tr>
              <th><?= __('Packs Per Shipment') ?></th>
              <td><?= $this->Number->precision($shipment->packs_per_shipment,2) ?></td>
          </tr>
        <?php }?>

         <tr>
            <th><?= __('Supplier') ?></th>
            <td><?= $shipment->supplier ?></td>
        </tr>
        <tr>
            <th><?= __('FBA Number') ?></th>
            <td><?= $shipment->fba_number ?></td>
        </tr>

        <tr>
            <th><?= __('UPC Number') ?></th>
            <td><?= $shipment->upc_number ?></td>
        </tr>
        <?php if($group_id <> 3) {?>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $shipment->price ?></td>
        </tr>
        <?php } ?>

    <tr>
        <th><?= __('Item Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->item_description)); ?></td>        
    </tr> 
     <tr>
        <th><?= __('Additional Information') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->additional_information)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Other Shipping Carried') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->other_shipping_carried)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Other Shipping Service') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->other_shipping_service)); ?></td>        
    </tr>

    <tr>
        <th><?= __('Shipping Instruction') ?></th>
        <td><?= $shipment->shipping_instruction ?></td>        
    </tr>   
    <tr>
        <th><?= __('Shipping Others') ?></th>
        <td><?= $shipment->shipping_others ?></td>        
    </tr>                    
    <tr>
        <th><?= __('Comments') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->comments. "  " . $shipment->combine_comment ." ". $shipment->correct_quantity_comment)); ?></td>        
    </tr>

     <?php if($shipment->send_option == 'send_part_of_it_to_amazon') { ?>
      <tr>
        <th><?= __('Quantity to send to amazon') ?></th>
        <td>
          <?php if($shipment->send_amazon_qty > 0) { ?>
            <?= $shipment->send_amazon_qty; ?>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
    <?php if(!empty($shipment->fnsku_label)) { ?>
      <tr>
        <th><?= __('FNSKU label') ?></th>
        <td>
            <a href="<?= $shipment->fnsku_label; ?>"><?= $shipment->fnsku_label; ?></a>
        </td>
      </tr>
    <?php } ?>
    <tr>
      <th><?= __('Uploaded shipment label') ?></th>
      <td>
        <?php if(!empty($shipment->shipment_label)) { ?>
          <a href="<?= $shipment->shipment_label; ?>"><?= $shipment->shipment_label; ?></a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <th><?= __('Uploaded shipment label') ?></th>
      <td>
        <?php if(!empty($shipment->shipment_label)) { ?>
          <a href="<?= $shipment->shipment_label; ?>"><?= $shipment->shipment_label; ?></a>
        <?php } ?>
      </td>
    </tr>
    
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($shipment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($shipment->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <a href="javascript:void(0);" class="btn btn-warning" onclick="history.go(-1);" ><i class="fa fa-angle-left"> </i> Back To list</a>
        </div><br>
    </div>
    </div>
</section>
