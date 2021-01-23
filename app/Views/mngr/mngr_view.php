<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">SuppSys Manager Page</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">Manager Page</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center"><br><br>
          <hr>
        <h3>Manager Page - Not done yet!</h3>
        <?php echo anchor('Home/logout', 'Logout'); ?>
        <br>
        Test: <?php echo anchor('get-gear/10', 'Test get gear'); ?>
        <br>
        Download Test: <?php echo anchor('Mngr/download_gear', 'Download Gear'); ?>
        <br><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <p>Working on it. Come back later ... </p>
        <hr>
        <br><br><br><br><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-6">
    <?php //echo anchor('mngr/99', 'List All', 'class="button rounded-btn submit-btn margin-bottom"')?>
     <?php
         if($gear_type == 'gear') {
           $gear_str = 'manager';
         }

         if($gear_type == 'boat') {
           $gear_str = 'get-boat-gear';
         }

         if($gear_type == 'other') {
           $gear_str = 'get-other-gear';
         }
         echo anchor($gear_str . '/1', ' &nbsp;  &nbsp; ', 'class="icon-sli-control-start"')?>
     <?php
         if($pg <= 1){
             echo '';
         }
         else {
           $link = $gear_str . '/'.($pg - 1);
           $btn = 'class="icon-sli-control-rewind"';
           echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
         }
        ?>

        <?php
         if($pg >= $no_pages){
             echo '';
         }
         else {
             $link = $gear_str . '/'.($pg + 1);
             //$btn = 'class="button submit-btn margin-bottom"';
             $btn = 'class="icon-sli-control-forward"';
             echo anchor($link, ' &nbsp;  &nbsp; ', $btn);
             echo ' ';
         }
        ?>

       <?php echo anchor($gear_str . '/' . $no_pages, ' &nbsp;  &nbsp; ', 'class="icon-sli-control-end"')?>
      </div>
      </div>

  </div>
</div>
