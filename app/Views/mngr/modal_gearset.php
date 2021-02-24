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
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
