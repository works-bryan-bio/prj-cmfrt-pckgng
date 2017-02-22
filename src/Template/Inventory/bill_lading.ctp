<form id="formModalShipments-<?php echo $inventory->id; ?>" method="post" action="<?= $base_url; ?>inventory/save_bill_lading">
    <input type="hidden" name="inventory_id" value="<?= $inventory->id; ?>" >
    <input type="hidden" name="edit_mode" value="off" class="edit_mode">
    <input type="hidden" name="old_bill_lading_file" value="" class="old_bill_lading_file">
    <div class="row" >
        <div class="form-group">
            <div class="col-sm-12" style="display:inline-flex">
                <span>File: &nbsp;</span> <input type="text" class="has-ck-finder bill_lading_file" name="bill_lading_file" required="required">
                <span style="margin-left:20px">Date Upload: &nbsp;</span> <input type="text" class="dt-default date_upload" name="date_upload">
                <span style="margin-left:20px">Remarks: &nbsp;</span> <input type="text" class="remarks" name="remarks">
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success btn-action-bill-lading" >Submit</button>
                <button type="button" class="btn btn-default btn-cancel-edit-bill-lading" style="display:none" >Cancel</button>
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
        <th>&nbsp;</th>
    </tr>

    <?php $c = 0; ?>
    <?php foreach($a_bill_lading as $key => $value) { ?>
        <?php $c++; ?>
        <tr>
            <td><a target="_blank" href="<?= $value['bill_lading_file']; ?>" ><?= $value['bill_lading_file']; ?></a></td>
            <td><?= $value['date_upload']; ?></td>
            <td><?= $value['remarks']; ?></td>
            <td>
                <a href="javascript:void(0);" class="btn btn-xs btn-success btn-edit-bill-lading" style="width:45% !important;" data-bill-lading-file="<?= $value['bill_lading_file']; ?>" data-date-upload="<?= $value['date_upload']; ?>" data-remarks="<?= $value['remarks']; ?>">Edit</a> &nbsp;
                <a href='#modalDeleteBillLading-<?php echo $inventory->id; ?>-<?= $c; ?>' data-toggle="modal" class="btn btn-xs btn-danger" style="width:45% !important;">Delete</a>

                <div id="modalDeleteBillLading-<?=$inventory->id?>-<?= $c; ?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Delete Confirmation</h4>
                        </div>
                        <div class="modal-body wrapper-lg">
                            <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                        </div>
                        <div class="modal-footer">
                            
                            <form method="post" action="<?= $base_url; ?>inventory/delete_bill_lading">
                                <input type="hidden" name="inventory_id" value="<?= $inventory->id; ?>">
                                <input type="hidden" name="bill_lading_file" value="<?= $value['bill_lading_file']; ?>">
                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                <button type="submit" class="btn btn-danger" >Yes</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </td>
        </tr>
    <?php } ?>
</table>