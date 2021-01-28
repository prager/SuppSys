<div id="delItem<?php echo $item['id_orders']; ?>" tabindex="-1" role="dialog" aria-labelledby="delItem<?php echo $item['id_orders']; ?>Label" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="delItem<?php echo $item['id_orders']; ?>Label" class="modal-title">Delete?</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p>Delete Item <strong><?php echo $item['desc']; ?>?</strong></p>
              <a href="<?php echo base_url() . '/index.php/delete-order/'. $item['id_orders']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </a>
              <br>
            </div>
          </div>
        </div>
      </div>
