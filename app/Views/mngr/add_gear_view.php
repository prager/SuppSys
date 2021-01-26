
<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Add Item</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
          <li class="breadcrumb-item active">Add Item</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <div class="box">
<?php echo form_open('add-gear'); ?>
      <div class="row">
        <div class="form-group col-lg-6">
          <label class="font-weight-bold text-small" for="firstname">Descripton<!--<span class="text-primary ml-1">&#42;</span>--></label>
          <input class="form-control" id="firstname" type="text" placeholder="Description">
        </div>
        <div class="form-group col-lg-3">
          <label class="font-weight-bold text-small" for="type">Gear Type</label>
          <!--<input class="form-control" id="type" type="text" placeholder="Enter your last name">-->
          <?php echo form_dropdown('type', $types, 0, 'class="form-control"'); ?>
        </div>
        <div class="form-group col-lg-3">
          <label class="font-weight-bold text-small" for="qty">Quantity</label>
          <input class="form-control" id="qty" type="text">
        </div>
        <div class="form-group col-lg-12">
          <label class="font-weight-bold text-small" for="email">Serial Number</label>
          <input class="form-control" id="sn" type="text" placeholder="Serial Number">
        </div>
        <div class="form-group col-lg-6">
          <label class="font-weight-bold text-small" for="size">Size</label>
          <input class="form-control" id="size" type="text" placeholder="Size">
        </div>
        <div class="form-group col-lg-6">
          <label class="font-weight-bold text-small" for="location">Location</label>
          <input class="form-control" id="location" type="text" placeholder="Location">
        </div>
        <div class="form-group col-lg-12">
          <button class="btn btn-primary" type="submit">Submit your request</button><br><br>
        </div>
<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
