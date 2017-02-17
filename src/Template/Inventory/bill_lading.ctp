<form id="formModalShipments-<?php echo $inventory->id; ?>" method="post" action="<?= $base_url; ?>inventory/update_bill_lading">
<input type="hidden" name="inventory_id" value="<?= $inventory->id; ?>" >
<div class="row" >
    <div class="form-group">
        <div class="col-sm-12" style="display:inline-flex">
            <span>File: &nbsp;</span> <input type="text" class="has-ck-finder" name="bill_lading_file">
            <span style="margin-left:20px">Date Upload: &nbsp;</span> <input type="text" class="dt-default" name="date_upload">
            <span style="margin-left:20px">Remarks: &nbsp;</span> <input type="text" class="" name="remarks">
        </div>
    </div>
</div>
<div class="row" style="margin-top:20px;">
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</div>
</form>
<br>

<?php
$a_bill_lading = unserialize($inventory->bill_lading_details);
if(empty($a_bill_lading)) {
    $a_bill_lading = array();
}
?>

<table class="table table-bordered">
    <tr>
        <th>File</th>
        <th>Date Uploaded</th>
        <th>Remarks</th>
    </tr>

    <?php foreach($a_bill_lading as $key => $value) { ?>
        <tr>
            <td><a target="_blank" href="<?= $value['bill_lading_file']; ?>" ><?= $value['bill_lading_file']; ?></a></td>
            <td><?= $value['date_upload']; ?></td>
            <td><?= $value['remarks']; ?></td>
        </tr>
    <?php } ?>
</table>