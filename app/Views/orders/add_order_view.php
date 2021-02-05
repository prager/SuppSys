
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-5">
        <h1 class="h2">Add Gear</h1>
      </div>
      <div class="col-md-7">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
          <li class="breadcrumb-item"><?php echo anchor('orders', 'Orders'); ?></li>
          <li class="breadcrumb-item"><?php echo anchor('test', 'Test'); ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div id="contact" class="container">
    <div class="row">
      <div class="col-lg-4">
        <section>
          <br><br>
        <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                    <li class="nav-item"><?php echo anchor('gear', 'Gear', 'class="nav-link d-flex align-items-center justify-content-between"'); ?>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><?php echo anchor('download-gear', 'Download Gear', 'class="nav-link"'); ?></li>
                          <li class="nav-item"><?php echo anchor('gearsets', 'Gearsets', 'class="nav-link"'); ?></li>
                            <li class="nav-item"><?php echo anchor('add_gearset', 'Add Gearset', 'class="nav-link"'); ?></li>
                      </ul>
                    </li>
                    <li class="nav-item"><?php echo anchor('orders', 'Orders', 'class="nav-link d-flex align-items-center justify-content-between"'); ?>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><?php echo anchor('download-orders', 'Download Orders', 'class="nav-link"'); ?></li>
                        <li class="nav-item"><?php echo anchor('pending-orders', 'Pending Orders', 'class="nav-link"'); ?></li>
                        <li class="nav-item"><?php echo anchor('delivered-orders', 'Delivered Orders', 'class="nav-link"'); ?></li>
                        <li class="nav-item"><?php echo anchor('cancelled-orders', 'Cancelled Orders', 'class="nav-link"'); ?></li>
                      </ul>
                    </li>
                    <li class="nav-item"><?php echo anchor('members', 'Members', 'class="nav-link d-flex align-items-center justify-content-between"'); ?>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><?php echo anchor('download-members', 'Download Members', 'class="nav-link"'); ?></li>
                        <li class="nav-item"><?php echo anchor('add-member', 'Add a Member', 'class="nav-link"'); ?></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
          </section>
      </div>
      <div class="col-lg-8">
        <section class="bar">
          <div class="heading">
            <h3>Add Order</h3>
          </div>
          <!--<form action="load-gear">-->
          <?php echo form_open('edit-order'); ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="desc">Descripton</label>
                  <?php
                       $data = array(
                           'name' => 'desc',
                           'id' => 'desc',
                           'placeholder' => 'Enter Description',
                           'title' => 'Enter Description',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="supplier">Supplier</label>
                  <?php
                       $data = array(
                           'name' => 'supplier',
                           'id' => 'supplier',
                           'placeholder' => 'Enter Supplier',
                           'title' => 'Enter Supplier',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="price">Price</label>
                  <?php
                       $data = array(
                           'name' => 'price',
                           'placeholder' => 'Price',
                           'title' => 'Price',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="qty">Quantity</label>
                  <?php
                       $data = array(
                           'type' => 'number',
                           'name' => 'qty',
                           'placeholder' => 'Quantity',
                           'title' => 'Quantity',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="part_no">Item No</label>
                  <?php
                			 $data = array(
                			     'name' => 'part_no',
                			     'placeholder' => 'Part No',
                			     'title' => 'Part No',
                           'class' => 'form-control'
                			 );
                			 echo form_input($data);
                			?>
                </div>
              </div>
              <div class="col-md-4">&nbsp;</div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="order_date"> Order Date</label>
                  <?php
                       $data = array(
                           'type' => 'date',
                           'name' => 'order_date',
                           'id' => 'order_date',
                           'title' => 'Order Date',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="date_received">Date Received</label>
                  <?php
                       $data = array(
                           'type' => 'date',
                           'name' => 'date_received',
                           'title' => 'Date Received',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="doc_no">Document Number</label>
                  <?php
                       $data = array(
                           'name' => 'doc_no',
                           'placeholder' => 'Document Number',
                           'title' => 'Document Number',
                           'class' => 'form-control'
                       );
                       echo form_input($data);
                      ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="order_no">Order Number</label>
                  <?php
                			 $data = array(
                			     'name' => 'order_no',
                			     'placeholder' => 'Order No',
                			     'title' => 'Order No',
                           'class' => 'form-control'
                			 );
                			 echo form_input($data);
                			?>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label class="font-weight-bold text-small" for="remarks">Remarks</label>
                  <?php
                			 $data = array(
                			     'name' => 'remarks',
                			     'placeholder' => 'Remarks',
                			     'title' => 'Remarks',
                           'class' => 'form-control'
                			 );
                			 echo form_input($data);
                			?>
                </div>
              </div>
              <div class="col-md-4">&nbsp;</div>
              </div>
              <div class="col-md-12 text-center"><br>
                <button type="submit" class="btn btn-template-outlined"><i class="fa fa-upload"></i> Add Order Item</button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </section>
      </div>

    </div>
  </div>
</div>
