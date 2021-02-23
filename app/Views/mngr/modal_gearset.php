<div class="modal fade" id="editData<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content p-md-3">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $item['desc']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('edit-gear/' . $item['id']); ?>
          <div class="row">
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="desc"> Descripton<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
            			     'name' => 'desc',
            			     'placeholder' => 'Enter Description',
            			     'title' => 'Enter Description',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $item['desc']);
            			?>
            </div>
            <div class="form-group col-lg-3">
              <label class="font-weight-bold text-small" for="type">Gear Type</label>
              <!--<input class="form-control" id="type" type="text" placeholder="Enter your last name">-->
              <?php //echo form_dropdown('type', $item['types'], $item['selected'], 'class="form-control"'); ?>
            </div>
            <div class="form-group col-lg-3">
              <label class="font-weight-bold text-small" for="qty">Quantity</label>
              <?php
            			 $data = array(
            			     'name' => 'qty',
            			     'placeholder' => 'Enter Qty',
            			     'title' => 'Enter Qty',
                       'class' => 'form-control'
            			 );
            			 //echo form_input($data, $item['qty']);
            			?>
            </div>
            <div class="form-group col-lg-12">
              <label class="font-weight-bold text-small" for="sn">Serial Number</label>
              <?php
            			 $data = array(
            			     'name' => 'sn',
            			     'placeholder' => 'Enter SN',
            			     'title' => 'Enter SN',
                       'class' => 'form-control'
            			 );
            			 //echo form_input($data, $item['sn']);
            			?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="size">Size</label>
              <?php
            			 $data = array(
            			     'name' => 'size',
            			     'placeholder' => 'Enter Size',
            			     'title' => 'Enter Size',
                       'class' => 'form-control'
            			 );
            			 //echo form_input($data, $item['size']);
            			?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="location">Location</label>
              <?php
            			 $data = array(
            			     'name' => 'location',
            			     'placeholder' => 'Enter Location',
            			     'title' => 'Enter Location',
                       'class' => 'form-control'
            			 );
            			 //echo form_input($data, $item['location']);
            			?>
            </div>
            <div class="form-group col-lg-12">
              <button class="btn btn-primary" type="submit">Submit your request</button><br><br>
              <?php //if($item['issued'] > 0) {?>
                <?php //echo anchor('download-gear-item/' . $item['id_gear'], 'Download Item'); ?>
            <?php //}?>
            </div>
            <div class="form-group col-lg-12">
              <?php //if($item['assg'] != NULL) {
                //foreach($item['assg'] as $mem) {
                //  echo $mem . ' | ';
                //}
              }?>
            </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
