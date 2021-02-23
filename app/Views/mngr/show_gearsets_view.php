<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-5">
        <h1 class="h2">Gearsets</h1>
      </div>
      <div class="col-md-7">
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
  <div class="container py-7">
    <div class="row py-7">
      <div class="col-lg-12 mx-auto">
          <div class="card-body p-7 bg-white rounded text-center">
            <small><?php echo 'Orders - Download: ' . anchor('download-orders', 'All Orders').' | '. anchor('download-pending', 'Pending').' | '.
                    anchor('download-cancelled', 'Cancelled').' | '.anchor('download-delivered', 'Delivered');?></small>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Copy</th>
                    <th>Date</th>
                    <th>Parent</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($gearsets as $item) {?>
                  <tr>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#editData<?php echo $item['id']; ?>"><?php echo $item['desc']; ?></a>
                      <?php include 'modal_del_gearset.php'; ?>
                    </td>
                    <td><?php echo 'Copy'; ?></td>
                    <td><?php echo $item['date']; ?></td>
                    <td><?php echo $item['parent']; ?></td>
                    <td class="text-center">
                      <?php if(!$item['assigned']) {?>
                      <a href="#" data-toggle="modal" data-target="#delGearset<?php echo $item['id']; ?>"><i class="fa fa-trash"></i></a>
                      <?php include 'modal_del_gearset.php';
                      }
                      else {
                        echo 'Assigned';
                      }?>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
