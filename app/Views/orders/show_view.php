<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-5">
        <h1 class="h2">Orders</h1>
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
      <div class="col-lg-10 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-7 bg-white rounded text-center">
            <small><?php echo 'Orders - Download: ' . anchor('download-orders', 'All Orders').' | '. anchor('download-pending', 'Pending').' | '.
                    anchor('download-cancelled', 'Cancelled').' | '.anchor('download-delivered', 'Delivered');?></small>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Doc Num</th>
                    <th>Qty</th>
                    <th>Ord Date</th>
                    <th>Rec Date</th>
                    <th>Ord Num</th>
                    <th>Remarks</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $item) {?>
                  <tr>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#editData<?php echo $item['id_orders']; ?>"><?php echo $item['desc']; ?></a>
                      <?php include 'modal_item.php'; ?>
                    </td>
                    <td><?php echo $item['doc_no']; ?></td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo $item['order_date']; ?></td>
                    <td><?php echo $item['date_received']; ?></td>
                    <td><?php echo $item['invoice_no']; ?></td>
                    <td><?php echo $item['remarks']; ?></td>
                    <td class="text-center">
                      <a href="#" data-toggle="modal" data-target="#delItem<?php echo $item['id_orders']; ?>"><i class="fa fa-trash"></i></a>
                      <?php include 'modal_delete.php'; ?>
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
</div>
