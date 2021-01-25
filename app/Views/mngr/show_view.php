<div id="content">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-10 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-5 bg-white rounded text-center">
            <?php echo 'Gear - ' . anchor('download-gear', 'Download Gear');?>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Issued</th>
                    <th>Location</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($gear as $item) {?>
                  <tr>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#editData<?php echo $item['id_gear']; ?>"><?php echo $item['desc']; ?></a>
                      <?php include 'modal_item.php'; ?>
                    </td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo $item['issued']; ?></td>
                    <td><?php echo $item['location']; ?></td>
                    <td class="text-center">
                      <a href="#" data-toggle="modal" data-target="#delItem<?php echo $item['id_gear']; ?>"><i class="fa fa-trash"></i></a>
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
