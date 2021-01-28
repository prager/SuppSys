<div class="modal fade" id="editData<?php echo $item['id_orders']; ?>" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content p-md-3">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $item['desc']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('edit-orders/' . $item['id_orders']); ?>
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
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="supplier">Supplier</label>
              <?php
            			 $data = array(
            			     'name' => 'supplier',
            			     'placeholder' => 'Supplier',
            			     'title' => 'Supplier',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $item['supplier']);
            			?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="price"> Price<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
            			     'name' => 'price',
            			     'placeholder' => 'Enter Price',
            			     'title' => 'Price',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, '$' . $item['price']);
            			?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="qty">Quantity</label>
              <?php
            			 $data = array(
            			     'name' => 'qty',
            			     'placeholder' => 'Quantity',
            			     'title' => 'Quantity',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $item['qty']);
            			?>
            </div>
            <div class="form-group col-lg-8">
              <label class="font-weight-bold text-small" for="part_no">Item No</label>
              <?php
            			 $data = array(
            			     'name' => 'part_no',
            			     'placeholder' => 'Part No',
            			     'title' => 'Part No',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $item['part_no']);
            			?>
            </div>
            <div class="form-group col-lg-4">&nbsp;</div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="order_date"> Order Date<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
                   $data = array(
                       'name' => 'order_date',
                       'placeholder' => 'Order Date',
                       'title' => 'Order Date',
                       'class' => 'form-control'
                   );
                   echo form_input($data, $item['order_date']);
                  ?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="date_received">Date Received</label>
              <?php
                   $data = array(
                       'name' => 'date_received',
                       'placeholder' => 'Date Received',
                       'title' => 'Date Received',
                       'class' => 'form-control'
                   );
                   echo form_input($data, $item['date_received']);
                  ?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="doc_no"> Document Number<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
                   $data = array(
                       'name' => 'doc_no',
                       'placeholder' => 'Document Number',
                       'title' => 'Document Number',
                       'class' => 'form-control'
                   );
                   echo form_input($data, $item['doc_no']);
                  ?>
            </div>
            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="invoice_no">Order Number</label>
              <?php
                   $data = array(
                       'name' => 'invoice_no',
                       'placeholder' => 'Order No',
                       'title' => 'Order No',
                       'class' => 'form-control'
                   );
                   echo form_input($data, $item['invoice_no']);
                  ?>
            </div>
            <div class="form-group col-lg-8">
              <label class="font-weight-bold text-small" for="remarks">Remarks</label>
              <?php
                   $data = array(
                       'name' => 'remarks',
                       'placeholder' => 'Remarks',
                       'title' => 'Remarks',
                       'class' => 'form-control'
                   );
                   echo form_input($data, $item['remarks']);
                  ?>
            </div>
            <div class="form-group col-lg-4">&nbsp;</div>
            <div class="form-group col-lg-12 text-center"><br>
              <button type="submit" class="btn btn-template-outlined"><i class="fa fa-upload"></i> Submit Your Request</button><br><br>
            </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
