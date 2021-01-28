<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Status</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
          <li class="breadcrumb-item"><?php echo anchor('gear', 'Gear'); ?></li>
          <li class="breadcrumb-item"><?php echo anchor('add-gear', 'Add Gear'); ?></li>
          <li class="breadcrumb-item"><?php echo anchor('test', 'Test'); ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <br><br><br><br><br>
          <hr>
        <h3><?php echo $title; ?></h3>
        <br><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <p><?php echo $msg; ?></p>
        <hr>
        <br><br><br><br><br>
      </div>
    </div>
  </div>
</div>
