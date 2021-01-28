
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-5">
        <h1 class="h2">Add Gear</h1>
      </div>
      <div class="col-md-7">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
          <li class="breadcrumb-item"><?php echo anchor('gear', 'Gear'); ?></li>
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
            <h3>SuppSys Supplies Management System</h3>
          </div>
          <div class="row d-flex align-items-stretch same-height">
            <div class="col-md-12">
              <!--<div class="box-simple box-white same-height">-->
                <br>
                <h4>Purpose of SuppSys Supply System</h4>
                <p>The purpose is to manage supplies of an organization with many different categories of supplies. </p>
                <p>In addition, the system supports individual gear items assignment to individual members. It tracks not only gear items,
                  but also it tracks these items to be assigned to individual members of the organization. </p>
              <!--</div>-->
            </div>
            <!--<div class="col-md-4">
              <div class="box-simple box-white same-height">
                <br>
                <h4>Gear</h4>
                <p>Manage all available <?php echo anchor('gear', 'Gear'); ?> Items<br>
                  Add <?php echo anchor('add-gear', 'Gear'); ?> Items<br>
                Download all gear <?php echo anchor('download-gear', 'Items'); ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box-simple box-white same-height">
                <br>
                <h4>Orders</h4>
                <p>Manage <?php echo anchor('orders', 'Orders'); ?><br>
                  Add an individual <?php echo anchor('add-order', 'Order'); ?><br>
                  Download all <?php echo anchor('download-orders', 'Orders'); ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box-simple box-white same-height">
                <br>
                <h4>Members and Gearsets</h4>
                <p> Manage <?php echo anchor('Members', 'Members') . ' <br> Add a ' . anchor('add-member', 'Member'); ?> <br>
                    Add a  <?php echo anchor('add-gearset', 'Gearset'); ?><br>
                    Download all <?php echo anchor('download-members', 'Members'); ?>
                </p>
              </div>
            </div>-->
          </div>
        </section>
      </div>

    </div>
  </div>
</div>
