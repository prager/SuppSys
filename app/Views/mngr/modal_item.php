<div class="modal fade" id="editData<?php echo $item['id_gear']; ?>" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content p-md-3">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $item['desc']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('edit-gear/' . $item['id_gear']); ?>
          <div class="row">
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="firstname">Descripton<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <input class="form-control" id="firstname" type="text" placeholder="Description" value="<?php echo $item['desc']; ?>">
            </div>
            <div class="form-group col-lg-3">
              <label class="font-weight-bold text-small" for="type">Gear Type></label>
              <!--<input class="form-control" id="type" type="text" placeholder="Enter your last name">-->
              <?php echo form_dropdown('type', $item['types'], $item['selected'], 'class="form-control"'); ?>
            </div>
            <div class="form-group col-lg-3">
              <label class="font-weight-bold text-small" for="qty">Quantity</label>
              <input class="form-control" id="qty" type="text" value="<?php echo $item['qty']; ?>">
            </div>
            <div class="form-group col-lg-12">
              <label class="font-weight-bold text-small" for="email">Serial Number</label>
              <input class="form-control" id="sn" type="text" placeholder="Serial Number" value="<?php echo $item['sn']; ?>">
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="size">Size</label>
              <input class="form-control" id="size" type="text" placeholder="Size" value="<?php echo $item['size']; ?>">
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="location">Location</label>
              <input class="form-control" id="location" type="text" placeholder="Location" value="<?php echo $item['location']; ?>">
            </div>
            <div class="form-group col-lg-12">
              <button class="btn btn-primary" type="submit">Submit your request</button><br><br>
              <?php if($item['issued'] > 0) {?>
                <?php echo anchor('download-gear-item/' . $item['id_gear'], 'Download Item'); ?>
            <?php }?>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
